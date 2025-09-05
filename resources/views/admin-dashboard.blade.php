<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard — Wantunan ni PomPom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Chart.js for charts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    :root{
      --bg:#121212;
      --panel:#1e1e1e;
      --soft:#2a2a2a;
      --text:#eaeaea;
      --muted:#a7a7a7;
      --accent:#ff8c00;
      --accent-2:#e67a00;
      --ok:#2ecc71;
      --warn:#ff6b6b;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:Arial,Helvetica,sans-serif;
      background:var(--bg);
      color:var(--text);
      display:flex;
      min-height:100vh;
    }
    /* Sidebar */
    .sidebar{
      width:265px;
      background:linear-gradient(180deg,#181818,#141414);
      border-right:1px solid #2a2a2a;
      padding:20px 16px;
      position:sticky;
      top:0;
      height:100vh;
    }
    .brand{
      display:flex; align-items:center; gap:12px;
      padding:8px 10px; margin-bottom:18px;
    }
    .brand img{width:42px; height:42px; border-radius:10px; object-fit:cover}
    .brand h1{font-size:16px; margin:0; letter-spacing:.4px; color:var(--accent)}
    .nav{
      display:flex; flex-direction:column; gap:6px; margin-top:10px;
    }
    .nav a{
      display:flex; align-items:center; gap:10px;
      padding:12px 12px; border-radius:10px; color:var(--text);
      text-decoration:none; transition:.2s background,.2s transform;
    }
    .nav a:hover{background:#1f1f1f; transform:translateX(2px)}
    .nav a.active{background:#202020; outline:1px solid #272727}
    .nav .badge{
      margin-left:auto; background:var(--soft); padding:2px 8px; border-radius:999px; font-size:12px; color:var(--muted)
    }

    /* Main */
    .main{
      flex:1; display:flex; flex-direction:column; min-width:0;
    }
    .topbar{
      display:flex; align-items:center; gap:12px; padding:14px 18px;
      border-bottom:1px solid #242424; background:#141414;
      position:sticky; top:0; z-index:5;
    }
    .search{
      flex:1; position:relative;
    }
    .search input{
      width:100%; padding:12px 40px 12px 40px; border-radius:10px; border:1px solid #2b2b2b;
      background:#1b1b1b; color:var(--text); outline:none;
    }
    .search .icon{
      position:absolute; left:12px; top:50%; transform:translateY(-50%); opacity:.7
    }
    .user{
      display:flex; align-items:center; gap:10px; padding:8px 10px; border-radius:999px; background:#1b1b1b; border:1px solid #262626;
    }
    .user img{width:28px; height:28px; border-radius:50%}
    .user .name{font-size:13px; color:var(--muted)}

    .content{
      padding:18px;
      display:grid;
      grid-template-columns: 1fr;
      gap:16px;
    }
    .section-title{
      font-size:14px; color:var(--muted); margin:8px 2px 2px;
    }

    /* KPI cards */
    .kpis{
      display:grid; gap:14px;
      grid-template-columns: repeat(4, minmax(220px,1fr));
    }
    .card{
      background:var(--panel); border:1px solid #272727; border-radius:14px; padding:16px;
      box-shadow:0 6px 16px rgba(0,0,0,.25);
    }
    .card .label{color:var(--muted); font-size:13px}
    .card .value{font-size:24px; font-weight:700; margin-top:6px}
    .delta{font-size:12px; margin-top:8px; color:var(--muted)}
    .delta.up{color:var(--ok)}
    .delta.down{color:var(--warn)}

    /* Grid: charts + lists */
    .grid-2{
      display:grid; grid-template-columns: 1.5fr 1fr; gap:16px;
    }

    /* Tables / lists */
    .table{
      width:100%; border-collapse:collapse; font-size:14px;
    }
    .table th,.table td{
      text-align:left; padding:10px 12px; border-bottom:1px solid #2a2a2a;
    }
    .table th{color:#bdbdbd; font-weight:600}
    .pill{
      display:inline-block; padding:4px 10px; border-radius:999px; font-size:12px; background:#242424; color:#cfcfcf; border:1px solid #2a2a2a;
    }
    .pill.warn{background:rgba(255,140,0,.12); border-color:rgba(255,140,0,.32); color:#ffb266}
    .pill.danger{background:rgba(255,107,107,.14); border-color:rgba(255,107,107,.3); color:#ff9c9c}

    /* Quick actions */
    .actions{
      display:flex; gap:10px; flex-wrap:wrap;
    }
    .btn{
      background:linear-gradient(90deg,var(--accent),var(--accent-2)); color:#fff; border:none;
      padding:10px 14px; border-radius:10px; cursor:pointer; font-weight:700; letter-spacing:.2px;
      transition:.15s transform,.25s box-shadow;
    }
    .btn:hover{transform:translateY(-1px); box-shadow:0 8px 18px rgba(230,122,0,.25)}
    .btn.alt{background:#222; border:1px solid #2b2b2b; color:#ddd}
    .btn.alt:hover{box-shadow:0 8px 18px rgba(0,0,0,.25)}

    /* Responsive */
    @media (max-width:1200px){
      .kpis{grid-template-columns: repeat(2, minmax(220px,1fr));}
      .grid-2{grid-template-columns:1fr}
    }
    @media (max-width:820px){
      .sidebar{display:none}
      .content{padding:14px}
      .kpis{grid-template-columns:1fr}
    }
  </style>
</head>
<body>
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="brand">
      <img src="images/logo.png" alt="Logo" />
      <h1>Wantunan ni PomPom<br><span style="color:#b8b8b8;font-weight:400">Admin Panel</span></h1>
    </div>
    <nav class="nav">
      <a href="#" class="active">🏠 Dashboard</a>
      <a href="#">🧾 POS</a>
      <a href="#">📦 Products <span class="badge">320</span></a>
      <a href="#">🗂️ Categories</a>
      <a href="#">📈 Reports</a>
      <a href="#">🤝 Suppliers</a>
      <a href="#">👤 Users <span class="badge">5</span></a>
      <a href="#">⚙️ Settings</a>
      <a href="#">🚪 Logout</a>
    </nav>
  </aside>

  <!-- MAIN -->
  <section class="main">
    <div class="topbar">
      <div class="search">
        <span class="icon">🔎</span>
        <input type="search" placeholder="Search products, users, receipts..." />
      </div>
      <div class="user">
        <img src="https://i.pravatar.cc/100?img=12" alt="Admin" />
        <span class="name">Admin • Owner</span>
      </div>
    </div>

    <div class="content">
      <div class="section-title">Overview</div>

      <!-- KPIs -->
      <div class="kpis">
        <div class="card">
          <div class="label">Today’s Sales</div>
          <div class="value">₱ 5,230.00</div>
          <div class="delta up">▲ +8.4% vs yesterday</div>
        </div>
        <div class="card">
          <div class="label">Transactions Today</div>
          <div class="value">57</div>
          <div class="delta">Avg ticket: ₱ 91.75</div>
        </div>
        <div class="card">
          <div class="label">Products in Stock</div>
          <div class="value">320</div>
          <div class="delta">12 new this week</div>
        </div>
        <div class="card">
          <div class="label">Low Stock Alerts</div>
          <div class="value" style="color:var(--warn)">8</div>
          <div class="delta down">▼ restock recommended</div>
        </div>
      </div>

      <!-- Charts + Low Stock -->
      <div class="grid-2">
        <div class="card">
          <div class="label">Sales — Last 7 Days</div>
          <canvas id="sales7d" height="120"></canvas>
        </div>

        <div class="card">
          <div class="label">Sales by Category</div>
          <canvas id="salesCat" height="120"></canvas>
        </div>
      </div>

      <!-- Inventory alerts + Recent transactions -->
      <div class="grid-2">
        <div class="card">
          <div class="label">Low Stock Items</div>
          <table class="table">
            <thead>
              <tr>
                <th>Item</th>
                <th>SKU</th>
                <th>On Hand</th>
                <th>Status</th>
                <th>Reorder</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Chicken Thigh</td>
                <td>MEAT-TH-01</td>
                <td>3</td>
                <td><span class="pill danger">Critical</span></td>
                <td><button class="btn">+ Purchase</button></td>
              </tr>
              <tr>
                <td>Rice (25kg)</td>
                <td>RC-25</td>
                <td>5</td>
                <td><span class="pill warn">Low</span></td>
                <td><button class="btn">+ Purchase</button></td>
              </tr>
              <tr>
                <td>Coke 1.5L</td>
                <td>CK-15</td>
                <td>7</td>
                <td><span class="pill warn">Low</span></td>
                <td><button class="btn">+ Purchase</button></td>
              </tr>
              <tr>
                <td>Disposable Spoon</td>
                <td>DSP-SPN</td>
                <td>0</td>
                <td><span class="pill danger">Out of Stock</span></td>
                <td><button class="btn">+ Purchase</button></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="card">
          <div class="label">Recent Transactions</div>
          <table class="table">
            <thead>
            <tr>
              <th>Receipt #</th>
              <th>Cashier</th>
              <th>Items</th>
              <th>Total</th>
              <th>Time</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>R-00981</td>
              <td>Maria</td>
              <td>3</td>
              <td>₱ 450.00</td>
              <td>10:42 AM</td>
            </tr>
            <tr>
              <td>R-00982</td>
              <td>Juan</td>
              <td>2</td>
              <td>₱ 300.00</td>
              <td>11:03 AM</td>
            </tr>
            <tr>
              <td>R-00983</td>
              <td>Lia</td>
              <td>5</td>
              <td>₱ 720.00</td>
              <td>11:28 AM</td>
            </tr>
            <tr>
              <td>R-00984</td>
              <td>Jose</td>
              <td>1</td>
              <td>₱ 120.00</td>
              <td>11:35 AM</td>
            </tr>
            </tbody>
          </table>
          <div style="margin-top:12px" class="actions">
            <button class="btn alt">View All Receipts</button>
            <button class="btn alt">Export CSV</button>
          </div>
        </div>
      </div>

      <!-- Quick actions -->
      <div class="card">
        <div class="label" style="margin-bottom:10px;">Quick Actions</div>
        <div class="actions">
          <button class="btn">+ Add Product</button>
          <button class="btn">📦 Manage Inventory</button>
          <button class="btn">👤 Manage Users</button>
          <button class="btn alt">📈 Reports</button>
          <button class="btn alt">⚙️ Settings</button>
        </div>
      </div>
    </div>
  </section>

  <script>
    // SALES LAST 7 DAYS
    const sales7dCtx = document.getElementById('sales7d').getContext('2d');
    new Chart(sales7dCtx, {
      type: 'line',
      data: {
        labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        datasets: [{
          label: 'Sales (₱)',
          data: [4300, 3800, 5200, 6100, 5700, 7200, 5230],
          tension: 0.35,
          borderColor: '#ff8c00',
          backgroundColor: 'rgba(255,140,0,.15)',
          fill: true,
          pointRadius: 3,
          pointHoverRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color: '#242424' }, ticks: { color: '#cfcfcf' } },
          y: { grid: { color: '#242424' }, ticks: { color: '#cfcfcf' } }
        }
      }
    });

    // SALES BY CATEGORY
    const salesCatCtx = document.getElementById('salesCat').getContext('2d');
    new Chart(salesCatCtx, {
      type: 'bar',
      data: {
        labels: ['Meals','Drinks','Snacks','Add-ons','Others'],
        datasets: [{
          label: '₱',
          data: [32000, 14500, 8800, 6200, 3100],
          backgroundColor: [
            'rgba(255,140,0,.8)',
            'rgba(230,122,0,.8)',
            'rgba(255,140,0,.6)',
            'rgba(230,122,0,.6)',
            'rgba(255,140,0,.4)',
          ],
          borderColor: '#ff8c00',
          borderWidth: 1
        }]
      },
      options: {
        responsive:true,
        plugins:{ legend:{ display:false }},
        scales:{
          x:{ grid:{ color:'#242424' }, ticks:{ color:'#cfcfcf' }},
          y:{ grid:{ color:'#242424' }, ticks:{ color:'#cfcfcf' }}
        }
      }
    });
  </script>
</body>
</html>
