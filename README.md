# FoodClub's

Aplicação simples de cardápio e carrinho de compras implementada com PHP, Bootstrap e JavaScript puro.

Integrantes
- Maihrendson Cauã de Carvalho Cassiano (RGM: 45186341)
- Lucas Gomes Mendes (RGM: 43576222)

Resumo
- Frontend: páginas em PHP que geram HTML estático com Bootstrap para estilo.
- Interatividade: JavaScript puro (vanilla) em `assets/js/script.js` para ações do carrinho (AJAX).
- Backend: endpoints PHP para manipular o carrinho em sessão (`admin/acao_carrinho.php`).
- Armazenamento temporário: carrinho guardado em `$_SESSION` (sessão PHP).

Arquivos importantes
- `public/cardapio.php` — Página principal com listagem de pratos e bebidas e botões para adicionar ao carrinho.
- `admin/dashboard.php` — Visualização do carrinho com remoção de itens e limpeza do carrinho.
- `admin/acao_carrinho.php` — Endpoint que recebe ações via POST/GET (`add`, `remove`, `clear`, `get`) e retorna JSON.
- `assets/js/script.js` — Código JavaScript que envia requisições AJAX para `acao_carrinho.php` e atualiza a interface sem recarregar.
- `assets/css/style.css` — Estilos customizados.

Remoções
- Foram removidos arquivos vazios/inutilizados: `public/item.php`, `admin/editar.php`, `admin/excluir.php`.
- O arquivo de conexão `db/conexao.php` também foi removido por não apresentar referências no código atual.

Como executar localmente
1. Instale e inicie o XAMPP (ou outro ambiente Apache + PHP).
2. Coloque a pasta do projeto em `htdocs` (já presente como `CardapioDeRestaurante`).
3. Acesse no navegador:

```
http://localhost/CardapioDeRestaurante/public/cardapio.php
http://localhost/CardapioDeRestaurante/admin/dashboard.php
```

Testes rápidos
- Na página do cardápio, clique em "Adicionar" para inserir itens no carrinho. Uma notificação aparecerá no canto inferior-direito.
- No dashboard, remova itens ou limpe o carrinho; as alterações são feitas via AJAX e a tabela é atualizada sem recarregar.

Considerações e próximos passos
- Se desejar persistir o carrinho em banco de dados (MySQL), eu posso adicionar `db/conexao.php` e adaptar as ações para gravar/ler do banco.
- Se preferir imagens reais, adicione os arquivos em `assets/images/` e atualizo `public/cardapio.php` para usá-las.

Licença
- Consulte o arquivo `LICENSE` no repositório.

