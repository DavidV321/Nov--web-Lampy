<?php if (!isset($_COOKIE['cookie_consent'])): ?>

<style>
    #cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.85);
        color: white;
        text-align: center;
        padding: 5px;
        font-size: 13px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }
    #cookie-banner p {
        flex: 1;
        text-align: left;
        margin: 0;
        padding-right: 20px;
    }
    #cookie-banner button {
        background: #f4a261;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 12px;
        border-radius: 5px;
        min-width: 80px;
    }
    #cookie-banner button.reject {
        background: #e63946;
    }
    #cookie-banner .buttons {
        display: flex;
        gap: 5px;
    }
</style>

<div id="cookie-banner">
  <p>Tento web používá cookies ke zlepšení uživatelského zážitku.</p>
  <div class="buttons">
    <button id="accept-cookies">Souhlasím</button>
    <button class="reject" id="reject-cookies">Odmítnout</button>
    <button onclick="openSettings()">Nastavení</button>
  </div>
</div>

<?php endif; ?>