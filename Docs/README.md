<!-- HEADER COM CSS CORPORATIVO -->
<div style="background: linear-gradient(135deg, #020617 0%, #0f172a 100%); padding: 30px; border-radius: 12px; text-align: center; margin-bottom: 25px; border: 1px solid #1e293b;">
  <h1 style="color: #f8fafc; font-family: 'Segoe UI', sans-serif; margin: 0; font-size: 28px; font-weight: 700; letter-spacing: -0.5px;">📁 Diretório de Ativos & Infraestrutura DevOps</h1>
  <p style="color: #38bdf8; font-family: 'Segoe UI', sans-serif; font-size: 16px; margin: 8px 0 0 0;">SkyBoom Express S.A. — Configurações de Servidor Core01</p>
</div>

---

<!-- CARD DE DESTAQUE DO NOTION COPIADO DO SEU LINK REAL -->
<div style="background-color: #f8fafc; border-left: 5px solid #000000; padding: 20px; border-radius: 6px; margin-bottom: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; border-left-width: 5px;">
  <h3 style="margin-top: 0; color: #0f172a; font-size: 18px; display: flex; align-items: center; gap: 8px;">
    🚀 Visualização Avançada Disponível no Notion
  </h3>
  <p style="color: #475569; font-size: 14px; line-height: 1.6;">
    A arquitetura conceitual e o Relatório de Diagnóstico Tecnológico completo contam com diagramas detalhados e formatação executiva ricos diretamente na plataforma do <b>Notion</b>. Para uma experiência otimizada, recomendamos o acesso pelo canal oficial:
  </p>
  <div style="margin-top: 15px;">
    <a href="https://app.notion.com/p/Relat-rio-de-Diagn-stico-Tecnol-gico-SkyBoom-Express-S-A-373130d71bbf8012b74bf74a4e1e2522" target="_blank" style="background-color: #000000; color: #ffffff; padding: 10px 20px; text-decoration: none; font-weight: 600; border-radius: 6px; font-size: 14px; display: inline-block; transition: background 0.2s;">
      🔗 Abrir Relatório no Notion (Visualização Recomendada) →
    </a>
  </div>
</div>

---

## 📋 Inventário Técnico do Servidor `sbx-srv-core01`

Abaixo estão descritos os artefatos técnicos, manifestos de orquestração e estruturas mapeados no diretório do projeto (`~/skyboom_project`), divididos conforme sua responsabilidade na infraestrutura:

<!-- TABELA DE ATIVOS BASEADA NA TERMINAL LOG -->
<table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-family: 'Segoe UI', sans-serif;">
  <thead>
    <tr style="background-color: #f1f5f9; border-bottom: 2px solid #cbd5e1;">
      <th style="padding: 12px; text-align: left; color: #334155; font-size: 14px; width: 30%;">Ativo / Diretório</th>
      <th style="padding: 12px; text-align: left; color: #334155; font-size: 14px; width: 70%;">Função na Infraestrutura & Hardening</th>
    </tr>
  </thead>
  <tbody>
    <!-- DOCKER COMPOSE -->
    <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top;">
        <code style="color: #0284c7; background-color: #f0f9ff; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">🐳 docker-compose.yml</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Orquestração de Contêineres:</b> Manifesto de definição multi-contêiner responsável pelo ciclo de vida, políticas de reinicialização automática (<i>restart policies</i>) e isolamento lógico das redes internas do ecossistema SkyBoom.
      </td>
    </tr>
    <!-- PROXY -->
    <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top;">
        <code style="color: #0f172a; background-color: #f1f5f9; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">🛡️ proxy /</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Gateway de Segurança & Proxy Reverso:</b> Diretório contendo os arquivos de configuração do servidor de borda. Responsável pela terminação SSL/TLS, ocultação da assinatura real do servidor interno e isolamento das requisições externas direcionadas às APIs.
      </td>
    </tr>
    <!-- SITE (INDEX.HTML) -->
    <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top;">
        <code style="color: #2563eb; background-color: #eff6ff; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">🌐 site /</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Interface Pública da Operadora:</b> Hospeda o frontend da aplicação de logística de carga de aviões da SkyBoom. Centraliza o arquivo <code>index.html</code>, que expõe os scripts de rastreamento e painéis visuais para o monitoramento de despacho de aeronaves e manifestos de peso/balanceamento.
      </td>
    </tr>
    <!-- ADMIN -->
   <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top; display: flex; flex-direction: column; gap: 6px; align-items: flex-start;">
        <code style="color: #4f46e5; background-color: #e0e7ff; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">🔐 admin /</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Painel Administrativo Restrito:</b> Ambiente isolado voltado exclusivamente para gerentes de pátio e operadores de segurança. Requer autenticação criptografada pesada para permitir o controle operacional e liberação de planos de voo.
      </td>
    </tr>
    <!-- API -->
    <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top;">
        <code style="color: #0891b2; background-color: #ecfeff; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">⚙️ api /</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Camada de Microsserviços e Integração:</b> Backend responsável pelas regras de negócio automatizadas, processamento de requisições, validação de tokens e persistência de dados. Funciona de maneira desacoplada para mitigar que um comprometimento na interface externa afete o núcleo operacional do sistema.
      </td>
    </tr>
    <!-- MARIADB DATA -->
    <tr style="border-bottom: 1px solid #e2e8f0;">
      <td style="padding: 14px; vertical-align: top;">
        <code style="color: #16a34a; background-color: #f0fdf4; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 13px;">📊 mariadb_data /</code>
      </td>
      <td style="padding: 14px; color: #475569; font-size: 14px; line-height: 1.5;">
        <b>Volume de Persistência de Dados:</b> Diretório mapeado para armazenamento seguro e isolado da base de dados relacional MariaDB, garantindo a integridade transacional e persistência dos dados sensíveis mesmo sob reinicialização dos contêineres.
