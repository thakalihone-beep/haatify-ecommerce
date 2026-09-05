import './bootstrap';

const menuButton = document.getElementById('menuButton');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

if (menuButton && sidebar && overlay) {
	menuButton.addEventListener('click', () => {
		const isOpen = sidebar.classList.toggle('-translate-x-full') === false;
		overlay.classList.toggle('hidden', !isOpen);
		menuButton.setAttribute('aria-expanded', String(isOpen));
	});

	overlay.addEventListener('click', () => {
		sidebar.classList.add('-translate-x-full');
		overlay.classList.add('hidden');
		menuButton.setAttribute('aria-expanded', 'false');
	});
}
