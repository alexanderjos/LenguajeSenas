const cache = new Map();

document.getElementById('nickname').addEventListener('blur', async function() {
    const nombre = this.value;

    if (cache.has(nombre)) {
        const data = cache.get(nombre);
        const errorNickname = document.getElementById('errorNick');
        if (data.existe) {
            errorNickname.textContent = 'Nickname no disponible pudes usar números';
        } else {
            errorNickname.textContent = '';
        }
        return;
    }

    try {
        const response = await fetch('../controllers/validar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nickname=${encodeURIComponent(nombre)}`,
        });

        const text = await response.text();
        const data = JSON.parse(text);

        cache.set(nombre, data);
        const errorNickname = document.getElementById('errorNick');
        if (data.existe) {
            errorNickname.textContent = 'Nickname no disponible pudes usar números';
        } else {
            errorNickname.textContent = '';
        }
    } catch (e) {
        console.error('Error:', e);
    }
});
