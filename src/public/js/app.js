(function () {
    const button = document.querySelector('[data-ping-button]');
    const status = document.querySelector('[data-status]');

    if (!button || !status) return;

    button.addEventListener('click', async () => {
        button.disabled = true;
        status.textContent = 'Loading...';

        try {
            const response = await fetch('/api/ping', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' }
            });

            if (!response.ok) {
                throw new Error('Request failed with status ' + response.status);
            }

            const data = await response.json();
            status.textContent = data.message || 'Success';
        } catch (error) {
            status.textContent = 'Request failed. Try again.';
        } finally {
            button.disabled = false;
        }
    });
})();
