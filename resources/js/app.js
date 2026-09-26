import './bootstrap';

const menuButton = document.getElementById('menuButton');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');
const closeSidebarButton = document.getElementById('closeSidebar');

function closeSidebar() {
	if (!sidebar || !overlay || !menuButton) return;

	sidebar.classList.add('-translate-x-full');
	overlay.classList.add('hidden');
	menuButton.setAttribute('aria-expanded', 'false');
}

function openSidebar() {
	if (!sidebar || !overlay || !menuButton) return;

	sidebar.classList.remove('-translate-x-full');
	overlay.classList.remove('hidden');
	menuButton.setAttribute('aria-expanded', 'true');
}

if (menuButton && sidebar && overlay) {
	menuButton.addEventListener('click', () => {
		const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
		if (isOpen) {
			closeSidebar();
		} else {
			openSidebar();
		}
	});

	overlay.addEventListener('click', closeSidebar);

	if (closeSidebarButton) {
		closeSidebarButton.addEventListener('click', closeSidebar);
	}
}
