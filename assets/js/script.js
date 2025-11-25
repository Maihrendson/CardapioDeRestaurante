document.addEventListener('DOMContentLoaded', function () {
	function showMessage(msg, type = 'success') {
		const div = document.createElement('div');
		div.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
		div.style.zIndex = 1080;
		div.textContent = msg;
		document.body.appendChild(div);
		setTimeout(() => div.classList.add('show'), 10);
		setTimeout(() => div.remove(), 2500);
	}

	function renderCart(cart) {
		const container = document.getElementById('cart-container');
		const tbody = document.getElementById('cart-items');
		const totalEl = document.getElementById('cart-total');

		if (!container || !tbody || !totalEl) return;

		const keys = Object.keys(cart || {});
		if (keys.length === 0) {
			container.innerHTML = '<div class="alert alert-info">O carrinho está vazio.</div>';
			return;
		}

		let html = '';
		let total = 0;
		for (const k of keys) {
			const it = cart[k];
			const subtotal = (parseFloat(it.preco) || 0) * (parseInt(it.qtd) || 0);
			total += subtotal;
			html += `
				<tr data-key="${k}">
					<td>${escapeHtml(it.nome)} <br><small class="text-muted">(${escapeHtml(k)})</small></td>
					<td class="text-end">R$ ${formatCurrency(it.preco)}</td>
					<td class="text-center">${parseInt(it.qtd)}</td>
					<td class="text-end">R$ ${formatCurrency(subtotal)}</td>
					<td class="text-center"><button class="btn btn-sm btn-danger remove-from-cart" data-key="${k}">Remover</button></td>
				</tr>`;
		}

		tbody.innerHTML = html;
		totalEl.textContent = 'R$ ' + formatCurrency(total);
	}

	function formatCurrency(v) {
		const n = parseFloat(v) || 0;
		return n.toFixed(2).replace('.', ',');
	}

	function escapeHtml(s) {
		if (!s) return '';
		return String(s).replace(/[&<>"']/g, function (c) {
			return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":"&#39;"}[c];
		});
	}

	document.body.addEventListener('click', function (e) {
		// Adicionar ao carrinho
		const addBtn = e.target.closest('.add-to-cart');
		if (addBtn) {
			e.preventDefault();

			const key = addBtn.getAttribute('data-key');
			const nome = addBtn.getAttribute('data-nome');
			const preco = addBtn.getAttribute('data-preco');

			const form = new FormData();
			form.append('action', 'add');
			form.append('key', key);
			form.append('nome', nome);
			form.append('preco', preco);

			fetch('../admin/acao_carrinho.php', {
				method: 'POST',
				body: form,
				credentials: 'same-origin'
			}).then(resp => resp.json())
			  .then(json => {
				  if (json && json.success) {
					  showMessage(`Adicionado: ${nome}`,'success');
					  // Atualiza visual do carrinho se estiver no dashboard
					  if (document.getElementById('cart-items')) renderCart(json.cart || {});
				  } else {
					  showMessage(json.msg || 'Erro ao adicionar', 'danger');
				  }
			  }).catch(err => {
				  console.error(err);
				  showMessage('Erro de conexão', 'danger');
			  });

			return;
		}

		// Limpar carrinho (preserva na mesma página)
		const clearBtn = e.target.closest('.clear-cart');
		if (clearBtn) {
			e.preventDefault();

			const form = new FormData();
			form.append('action', 'clear');

			fetch('../admin/acao_carrinho.php', {
				method: 'POST',
				body: form,
				credentials: 'same-origin'
			}).then(resp => resp.json())
			  .then(json => {
				  if (json && json.success) {
					  showMessage('Carrinho limpo', 'success');
					  if (document.getElementById('cart-items')) renderCart(json.cart || {});
					  else setTimeout(() => location.reload(), 600);
				  } else {
					  showMessage(json.msg || 'Erro ao limpar', 'danger');
				  }
			  }).catch(err => {
				  console.error(err);
				  showMessage('Erro de conexão', 'danger');
			  });

			return;
		}

		// Remover item do carrinho (dashboard)
		const removeBtn = e.target.closest('.remove-from-cart');
		if (removeBtn) {
			e.preventDefault();
			const key = removeBtn.getAttribute('data-key');

			const form = new FormData();
			form.append('action', 'remove');
			form.append('key', key);

			fetch('../admin/acao_carrinho.php', {
				method: 'POST',
				body: form,
				credentials: 'same-origin'
			}).then(r => r.json())
			.then(json => {
				if (json && json.success) {
					showMessage('Item removido', 'success');
					if (document.getElementById('cart-items')) renderCart(json.cart || {});
				} else {
					showMessage(json.msg || 'Erro ao remover', 'danger');
				}
			}).catch(err => {
				console.error(err);
				showMessage('Erro de conexão', 'danger');
			});

			return;
		}
	});
});