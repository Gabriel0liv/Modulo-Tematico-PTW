# Modulo-Tematico-PTW

## Descrição

Este projeto é uma plataforma focada em trocas, compras e vendas de jogos e consoles, com funcionalidades voltadas para a segurança, privacidade e praticidade dos utilizadores. O sistema segue as normas do RGPD (Regulamento Geral sobre a Proteção de Dados) e adota boas práticas de desenvolvimento em Blade, PHP/Laravel e JavaScript.

## Funcionalidades Principais

- **Gestão de Utilizadores**: Permite cadastro, login, edição de perfis, gerenciamento de moradas e métodos de pagamento.
- **Administração**: Painéis para gerenciar utilizadores ativos/inativos, denúncias, anúncios aprovados/rejeitados e categorias.
- **Sistema de Denúncias**: Usuários podem reportar condutas impróprias, anúncios enganosos ou comentários ofensivos. As denúncias são analisadas pela administração, podendo resultar em suspensão ou bloqueio de contas.
- **Controle de Pagamentos**: Integração com Stripe para processar pagamentos de forma segura. Os dados completos dos cartões não são armazenados pela plataforma.
- **Privacidade**: Gerenciamento seguro de dados pessoais, incluindo moradas, senhas (criptografadas), imagens de perfil e histórico de interações.
- **Busca e Filtros**: Ferramenta de pesquisa com filtros por console, modelo e outros critérios.
- **Painel do Usuário**: Visualização e edição de dados, histórico de compras, comentários e banimentos.

## Tecnologias Utilizadas

- **Blade** (principal linguagem de views)
- **PHP** e **Laravel** (backend)
- **JavaScript** (interatividade e validações no frontend)
- **Stripe** (processamento de pagamentos)
- **HTML/CSS** (interfaces modernas e responsivas)
