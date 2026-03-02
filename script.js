// ─────────────── DATA ───────────────
let menuItems = [
  { id: 1, name: 'Döner Kebab Classic', cat: 'döner', price: 10.50, desc: 'Malse vleesschijven van het spit, met salade, tomaat en tzatziki in vers pide brood.', badge: 'Bestseller', img: '' },
  { id: 2, name: 'Döner Box Deluxe', cat: 'döner', price: 13.50, desc: 'Ruime box met döner, bulgursalade, geroosterde groenten, hummus en drie sauzen.', badge: 'Nieuw', img: '' },
  { id: 3, name: 'Döner Schotel', cat: 'döner', price: 15.00, desc: 'Royale schotel met rijst, lavas brood, döner vlees en verse salades.', badge: '', img: '' },
  { id: 4, name: 'Adana Kebab', cat: 'kebab', price: 16.50, desc: 'Pittige gemalen lamsgehakt aan het spit, geserveerd met bulgur en geroosterde paprika.', badge: '', img: '' },
  { id: 5, name: 'Şiş Kebab', cat: 'kebab', price: 17.00, desc: 'Malse lamsblokjes gemarineerd in Anatolische kruiden, gegrild aan de spies.', badge: "Chef's keuze", img: '' },
  { id: 6, name: 'Izgara Köfte', cat: 'kebab', price: 14.00, desc: 'Huisgemaakte köfte van gemengd gehakt met peterselie en specerijen.', badge: '', img: '' },
  { id: 7, name: 'Meze Schotel (4 pers)', cat: 'meze', price: 19.50, desc: 'Hummus, babaganoush, ezme, dolma, beyaz peynir, zeitunen en vers pide brood.', badge: 'Deel samen', img: '' },
  { id: 8, name: 'Mercimek Çorbası', cat: 'meze', price: 6.50, desc: 'Traditionele Turkse rode linzensoep met citroen en munt.', badge: '', img: '' },
  { id: 9, name: 'Kaşarlı Pide', cat: 'pide', price: 13.00, desc: 'Bootvorming pide gevuld met gesmolten kaşar kaas en verse kruiden.', badge: '', img: '' },
  { id: 10, name: 'Karışık Pide', cat: 'pide', price: 15.50, desc: 'Gevuld met gehakt, kaas, groenten en ei — het allerbeste van onze pide-oven.', badge: 'Populair', img: '' },
  { id: 11, name: 'Baklava (3 stuks)', cat: 'dessert', price: 7.50, desc: 'Knapperig filodeeg met walnoten, gedrenkt in oranjebloesemhoning.', badge: 'Huisgemaakt', img: '' },
  { id: 12, name: 'Çay (Turkse Thee)', cat: 'drank', price: 2.50, desc: 'Authentieke Turkse zwarte thee, geserveerd in traditioneel çay-glas.', badge: '', img: '' },
];

let cart = [];
let reservations = [];
let messages = [];
let deleteTarget = null;
let isLoggedIn = false;
let currentCategory = 'all';

// ─────────────── NAVIGATION ───────────────
function showPage(page) {
  if (page === 'admin' && !isLoggedIn) { showPage('login'); return; }
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('page-' + page).classList.add('active');
  document.querySelectorAll('[data-page]').forEach(a => {
    a.classList.toggle('active', a.dataset.page === page);
  });
  window.scrollTo(0, 0);
  if (page === 'menu') renderMenu();
  if (page === 'admin') { renderAdminMenu(); updateDashboard(); }
}

// ─────────────── MENU RENDERING ───────────────
function renderMenu() {
  const grid = document.getElementById('menuGrid');
  const search = document.getElementById('menuSearch').value.toLowerCase();
  const filtered = menuItems.filter(item => {
    const matchCat = currentCategory === 'all' || item.cat === currentCategory;
    const matchSearch = item.name.toLowerCase().includes(search) || item.desc.toLowerCase().includes(search);
    return matchCat && matchSearch;
  });

  if (filtered.length === 0) {
    grid.innerHTML = '<div style="grid-column:1/-1;text-align:center;padding:4rem;color:#999;font-style:italic;font-size:1.2rem">Geen gerechten gevonden voor uw zoekopdracht.</div>';
    return;
  }

  grid.innerHTML = filtered.map(item => `
    <div class="menu-card">
      ${item.badge ? `<div class="menu-card-badge">${item.badge}</div>` : ''}
      <div class="menu-card-image">
        <div class="img-placeholder">
          <div class="ph-icon">🍽️</div>
          <div class="ph-text">${item.name}</div>
        </div>
      </div>
      <div class="menu-card-body">
        <div class="menu-card-title">${item.name}</div>
        <div class="menu-card-desc">${item.desc}</div>
        <div class="menu-card-footer">
          <div class="menu-price">€${item.price.toFixed(2)}</div>
          <button class="add-cart-btn" onclick="addToCart(${item.id})">+ Toevoegen</button>
        </div>
      </div>
    </div>
  `).join('');
}

function filterMenu() { renderMenu(); }

function filterByCategory(cat, btn) {
  currentCategory = cat;
  document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  renderMenu();
}

// ─────────────── CART ───────────────
function addToCart(id) {
  const item = menuItems.find(i => i.id === id);
  if (!item) return;
  const existing = cart.find(i => i.id === id);
  if (existing) existing.qty++;
  else cart.push({ ...item, qty: 1 });
  updateCart();
  showToast(item.name + ' toegevoegd aan winkelwagen', 'success');
}

function updateCart() {
  const badge = document.getElementById('cartBadge');
  const total = cart.reduce((s, i) => s + i.qty, 0);
  badge.textContent = total;

  const itemsEl = document.getElementById('cartItems');
  if (cart.length === 0) {
    itemsEl.innerHTML = '<p class="cart-empty">Uw winkelwagen is leeg</p>';
  } else {
    itemsEl.innerHTML = cart.map(item => `
      <div class="cart-item">
        <div class="cart-item-img">
          <div class="img-placeholder" style="width:100%;height:100%;border:none">
            <span style="font-size:1.5rem">🍽️</span>
          </div>
        </div>
        <div class="cart-item-info">
          <div class="cart-item-name">${item.name}</div>
          <div class="cart-item-price">€${(item.price * item.qty).toFixed(2)}</div>
        </div>
        <div class="cart-item-qty">
          <button class="qty-btn" onclick="changeQty(${item.id},-1)">−</button>
          <span>${item.qty}</span>
          <button class="qty-btn" onclick="changeQty(${item.id},1)">+</button>
        </div>
      </div>
    `).join('');
  }

  const grandTotal = cart.reduce((s, i) => s + i.price * i.qty, 0);
  document.getElementById('cartTotal').textContent = '€' + grandTotal.toFixed(2);
}

function changeQty(id, delta) {
  const item = cart.find(i => i.id === id);
  if (!item) return;
  item.qty += delta;
  if (item.qty <= 0) cart = cart.filter(i => i.id !== id);
  updateCart();
}

function toggleCart() {
  document.getElementById('cartOverlay').classList.toggle('open');
  document.getElementById('cartSidebar').classList.toggle('open');
}

// ─────────────── AUTH ───────────────
function doLogin() {
  const user = document.getElementById('loginUser').value;
  const pass = document.getElementById('loginPass').value;
  if (user === 'admin' && pass === 'baba2025') {
    isLoggedIn = true;
    document.getElementById('loginNavLink').style.display = 'none';
    document.getElementById('adminNavLink').style.display = 'inline';
    document.getElementById('loginError').style.display = 'none';
    showPage('admin');
    showToast('Welkom terug!', 'success');
  } else {
    document.getElementById('loginError').style.display = 'block';
  }
}

function doLogout() {
  isLoggedIn = false;
  document.getElementById('loginNavLink').style.display = 'inline';
  document.getElementById('adminNavLink').style.display = 'none';
  document.getElementById('loginUser').value = '';
  document.getElementById('loginPass').value = '';
  showPage('home');
  showToast('Uitgelogd');
}

// ─────────────── ADMIN NAV ───────────────
function showAdminPage(page, btn) {
  document.querySelectorAll('.admin-page').forEach(p => p.classList.remove('active'));
  document.getElementById('admin-' + page).classList.add('active');
  document.querySelectorAll('.admin-nav-item').forEach(i => i.classList.remove('active'));
  if (btn) btn.classList.add('active');
}

// ─────────────── ADMIN MENU TABLE ───────────────
function renderAdminMenu() {
  const tbody = document.getElementById('adminMenuBody');
  tbody.innerHTML = menuItems.map(item => `
    <tr>
      <td><strong>${item.name}</strong></td>
      <td><span style="font-family:'Cinzel',serif;font-size:0.7rem;letter-spacing:1px;text-transform:uppercase;color:var(--turkoois)">${item.cat}</span></td>
      <td style="color:var(--terracotta);font-family:'Cinzel Decorative',cursive">€${item.price.toFixed(2)}</td>
      <td><span class="status-badge status-accepted">✓ Beschikbaar</span></td>
      <td style="display:flex;gap:0.5rem;flex-wrap:wrap">
        <button class="btn-secondary" style="font-size:0.6rem;padding:0.5rem 0.8rem" onclick="openEdit(${item.id})">✏️ Bewerken</button>
        <button class="btn-danger" style="font-size:0.6rem;padding:0.5rem 0.8rem" onclick="openDeleteModal(${item.id})">🗑️ Verwijderen</button>
      </td>
    </tr>
  `).join('');
  document.getElementById('statDishes').textContent = menuItems.length;
}

// ─────────────── ADD DISH ───────────────
function addDish() {
  const name = document.getElementById('newDishName').value.trim();
  const cat = document.getElementById('newDishCat').value;
  const price = parseFloat(document.getElementById('newDishPrice').value);
  const badge = document.getElementById('newDishBadge').value.trim();
  const desc = document.getElementById('newDishDesc').value.trim();

  if (!name || !price || !desc) {
    showToast('Vul alle verplichte velden in', 'error');
    return;
  }

  const newId = Math.max(...menuItems.map(i => i.id)) + 1;
  menuItems.push({ id: newId, name, cat, price, badge, desc, img: '' });

  document.getElementById('newDishName').value = '';
  document.getElementById('newDishPrice').value = '';
  document.getElementById('newDishBadge').value = '';
  document.getElementById('newDishDesc').value = '';

  showToast(name + ' toegevoegd aan het menu!', 'success');
  renderAdminMenu();
  updateDashboard();
}

// ─────────────── EDIT DISH ───────────────
function openEdit(id) {
  const item = menuItems.find(i => i.id === id);
  if (!item) return;
  document.getElementById('editDishId').value = id;
  document.getElementById('editDishName').value = item.name;
  document.getElementById('editDishCat').value = item.cat;
  document.getElementById('editDishPrice').value = item.price;
  document.getElementById('editDishBadge').value = item.badge;
  document.getElementById('editDishDesc').value = item.desc;
  document.getElementById('editDishImg').value = item.img || '';
  showPage('edit');
}

function saveEditDish() {
  const id = parseInt(document.getElementById('editDishId').value);
  const item = menuItems.find(i => i.id === id);
  if (!item) return;
  item.name = document.getElementById('editDishName').value;
  item.cat = document.getElementById('editDishCat').value;
  item.price = parseFloat(document.getElementById('editDishPrice').value);
  item.badge = document.getElementById('editDishBadge').value;
  item.desc = document.getElementById('editDishDesc').value;
  item.img = document.getElementById('editDishImg').value;
  showToast(item.name + ' bijgewerkt!', 'success');
  showPage('admin');
  showAdminPage('menu-manage', null);
  renderAdminMenu();
}

// ─────────────── DELETE ───────────────
function openDeleteModal(id) {
  deleteTarget = id;
  document.getElementById('deleteModal').classList.add('open');
}

function confirmDelete() {
  menuItems = menuItems.filter(i => i.id !== deleteTarget);
  closeModal('deleteModal');
  renderAdminMenu();
  updateDashboard();
  showToast('Gerecht verwijderd van het menu', 'error');
}

function closeModal(id) {
  document.getElementById(id).classList.remove('open');
}

// ─────────────── RESERVATIONS ───────────────
function submitReservation() {
  const name = document.getElementById('resName').value.trim();
  const phone = document.getElementById('resPhone').value.trim();
  const email = document.getElementById('resEmail').value.trim();
  const date = document.getElementById('resDate').value;
  const time = document.getElementById('resTime').value;
  const guests = document.getElementById('resGuests').value;
  const occasion = document.getElementById('resOccasion').value;
  const notes = document.getElementById('resNotes').value.trim();

  if (!name || !phone || !email || !date) {
    showToast('Vul alle verplichte velden in', 'error');
    return;
  }

  reservations.push({
    id: Date.now(),
    name, phone, email, date, time, guests, occasion, notes,
    status: 'pending',
    created: new Date().toLocaleString('nl-NL')
  });

  document.getElementById('resName').value = '';
  document.getElementById('resPhone').value = '';
  document.getElementById('resEmail').value = '';
  document.getElementById('resDate').value = '';
  document.getElementById('resNotes').value = '';

  showToast('Reservering ontvangen! Wij bevestigen zo spoedig mogelijk.', 'success');
  document.getElementById('resBadge').style.display = 'block';
  updateDashboard();
  renderReservations();
}

function renderReservations() {
  const el = document.getElementById('reservationsList');
  if (reservations.length === 0) {
    el.innerHTML = '<p style="color:#999;font-style:italic">Nog geen reserveringen ontvangen.</p>';
    return;
  }
  el.innerHTML = `
    <table class="admin-table">
      <thead>
        <tr>
          <th>Naam</th><th>Datum</th><th>Tijd</th><th>Gasten</th><th>Gelegenheid</th><th>Status</th><th>Acties</th>
        </tr>
      </thead>
      <tbody>
        ${reservations.map(r => `
          <tr>
            <td>
              <strong>${r.name}</strong><br>
              <small style="color:#999">${r.phone}</small><br>
              <small style="color:#999">${r.email}</small>
            </td>
            <td>${r.date}</td>
            <td>${r.time}</td>
            <td>${r.guests}</td>
            <td>${r.occasion}</td>
            <td><span class="status-badge status-${r.status}">
              ${r.status === 'pending' ? '⏳ In behandeling' : r.status === 'accepted' ? '✓ Geaccepteerd' : '✕ Geweigerd'}
            </span></td>
            <td style="display:flex;gap:0.4rem;flex-wrap:wrap">
              ${r.status === 'pending' ? `
                <button class="btn-secondary" style="font-size:0.6rem;padding:0.4rem 0.7rem" onclick="updateRes(${r.id},'accepted')">✓ Accepteren</button>
                <button class="btn-danger" style="font-size:0.6rem;padding:0.4rem 0.7rem" onclick="updateRes(${r.id},'rejected')">✕ Weigeren</button>
              ` : '<span style="font-size:0.8rem;color:#999">—</span>'}
            </td>
          </tr>
        `).join('')}
      </tbody>
    </table>
  `;
}

function updateRes(id, status) {
  const r = reservations.find(r => r.id === id);
  if (r) {
    r.status = status;
    renderReservations();
    showToast(
      'Reservering ' + (status === 'accepted' ? 'geaccepteerd' : 'geweigerd'),
      status === 'accepted' ? 'success' : 'error'
    );
  }
}

// ─────────────── CONTACT ───────────────
function submitContact() {
  const first = document.getElementById('contactFirst').value.trim();
  const last = document.getElementById('contactLast').value.trim();
  const email = document.getElementById('contactEmail').value.trim();
  const subject = document.getElementById('contactSubject').value;
  const message = document.getElementById('contactMessage').value.trim();

  if (!first || !email || !message) {
    showToast('Vul alle verplichte velden in', 'error');
    return;
  }

  messages.push({
    id: Date.now(),
    sender: first + ' ' + last,
    email, subject, message,
    status: 'unread',
    created: new Date().toLocaleString('nl-NL')
  });

  document.getElementById('contactFirst').value = '';
  document.getElementById('contactLast').value = '';
  document.getElementById('contactEmail').value = '';
  document.getElementById('contactMessage').value = '';

  showToast('Bericht verzonden! Wij reageren binnen 24 uur.', 'success');
  document.getElementById('msgBadge').style.display = 'block';
  updateDashboard();
  renderMessages();
}

function renderMessages() {
  const el = document.getElementById('messagesList');
  if (messages.length === 0) {
    el.innerHTML = '<p style="color:#999;font-style:italic">Nog geen berichten ontvangen.</p>';
    return;
  }
  el.innerHTML = messages.map(m => `
    <div class="message-card ${m.status}" onclick="openMessage(${m.id})">
      <div class="message-meta">
        <span class="message-sender">${m.sender} — ${m.email}</span>
        <span class="status-badge status-${m.status}">
          ${m.status === 'unread' ? '● Ongelezen' : '✓ Gelezen'}
        </span>
      </div>
      <div style="font-family:'Cinzel',serif;font-size:0.75rem;color:var(--turkoois);margin-bottom:0.3rem">
        ${m.subject}
      </div>
      <div class="message-preview">
        ${m.message.substring(0, 120)}${m.message.length > 120 ? '...' : ''}
      </div>
      <div style="font-size:0.8rem;color:#aaa;margin-top:0.5rem">${m.created}</div>
    </div>
  `).join('');
}

function openMessage(id) {
  const m = messages.find(m => m.id === id);
  if (!m) return;
  m.status = 'read';
  document.getElementById('msgModalSender').textContent = 'Bericht van ' + m.sender;
  document.getElementById('msgModalContent').textContent = m.message;
  document.getElementById('msgModalMeta').textContent =
    'Onderwerp: ' + m.subject + ' · ' + m.created + ' · ' + m.email;
  document.getElementById('msgModal').classList.add('open');

  const unread = messages.filter(m => m.status === 'unread').length;
  document.getElementById('msgBadge').style.display = unread > 0 ? 'block' : 'none';
  renderMessages();
  updateDashboard();
}

// ─────────────── DASHBOARD ───────────────
function updateDashboard() {
  document.getElementById('statDishes').textContent = menuItems.length;
  const today = new Date().toISOString().split('T')[0];
  const todayRes = reservations.filter(r => r.date === today).length;
  document.getElementById('statReservations').textContent = todayRes;
  const unread = messages.filter(m => m.status === 'unread').length;
  document.getElementById('statMessages').textContent = unread;
}

// ─────────────── TOAST ───────────────
function showToast(msg, type = '') {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.className = 'toast show ' + type;
  setTimeout(() => t.classList.remove('show'), 3500);
}

// ─────────────── INIT ───────────────
renderMenu();
