<?php
// Data Loan Portfolio Growth (Line Chart)
$loanGrowthLabels = ["Q1", "Q2", "Q3", "Q4"];
$loanGrowthValues = [0, 300, 500, 900];

$growthLabels = json_encode($loanGrowthLabels);
$growthValues = json_encode($loanGrowthValues);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SANFytics | Dashboard</title>
    <link rel="icon" type="image/png" href="assets/img/astra1.jpg">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: white;
            display: flex;
            height: 50px;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .logo-container {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
        }
        .menu {
    display: flex;
    gap: 50px;
    margin-right: 50px;
}
.menu-container {
            display: flex;
            align-items: center;
        }
.menu a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    transition: color 0.3s;
}

.menu a:hover {
    color: #007bff;
}
.logout-button {
            padding: 8px 16px;
            background-color: white;
            color: blue;
            border: 2px solid blue;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .logout-button:hover {
            background-color: #f2f2f2;
        }
        .container {
            padding: 30px;
        }
        .title1 {
            font-size: 50px;
            font-weight: bold;
            margin-top: 20px;
            color: #1a1a1a;
        }
        .charts {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            flex: 1;
        }
        
.card3 {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 120%;
    height: 50%;
}
.card2 {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    width: 70%;
    height: 40%;
    margin-top: 20px;
    margin-left: auto;
}
        .left-column {
    display: flex;
    flex-direction: column;
    gap: 30px;
}
.subtitle {
    font-size: 24px;
    
    margin-bottom: 20px;
    color: #333;
}   
.card1 {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    width: 400px;
    margin-top: 20px;
    height: 130px;
}


.card1 h3 {
    font-size: 18px;
    font-weight: normal;
    margin-bottom: 0;
    margin-top: -5px; /* sedikit naik */
    color: #333;
}


.revenue-amount {
    font-size: 32px;
    font-weight: bold;
    color: #111;
    margin-bottom: 15px;
    margin-top: 10px;
}

.revenue-divider {
    border-bottom: 1px solid #eee;
    margin-bottom: 15px;
}

.revenue-bottom {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 500;
    color: #333;
    font-weight: bold;
    margin-top: 30px;
}

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo-container">
        <img src="assets/img/icons1.png" alt="Logo" style="height:25px; margin-right:10px;">
        SANFytics
    </div>
    <div class="menu-container">
        <div class="menu">
            <a href="home.php">Home</a>
            <a href="analisis.php">Analytics</a>
            <a href="reports.php">Reports</a>
        </div>
        <a href="index.php" class="logout-button">Logout</a>
    </div>
</div>

<div class="container">
    <div class="title1">Financial Dashboard</div>
    <div class="subtitle">
    PT Surya Artha Nusantara Finance
    </div>
    <div class="charts">
        <!-- Kolom kiri -->
        <div class="left-column">
        <div class="card1">
    <h3>Total Revenue</h3>
    <div class="revenue-amount">Rp 850B</div>
    <div class="revenue-divider"></div>
    <div class="revenue-bottom">
        <span>ROA</span>
        <span>2,3%</span>
    </div>
</div>

<div class="card1">
    <h3>Net Income</h3>
    <div class="revenue-amount">Rp 100B</div>
    <div class="revenue-divider"></div>
    <div class="revenue-bottom">
        <span>Loan Portofolio</span>
        <span>Rp 1.200B</span>
    </div>
</div>

<div class="card1">
    <h3>Loan Portofolio</h3>
    <div class="revenue-amount">Rp 1.200B</div>
    
</div>
        </div>

        <!-- Kolom kanan -->
        <div class="card2">
            <h1>Revenue Projection</h1>
            <canvas id="loanLineChart"></canvas>
        </div>
    </div>
</div>


<script>

   // Line Chart
new Chart(document.getElementById("loanLineChart"), {
    type: 'line',
    data: {
        labels: <?= $growthLabels ?>,
        datasets: [{
            label: 'Revenue Projection',
            data: <?= $growthValues ?>,
            borderColor: '#4169E1',
            backgroundColor: 'rgba(65,105,225,0.2)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                min: 0,
                max: 900,
                ticks: {
                    stepSize: 300
                }
            }
        }
    }
});

</script>

</body>
</html>