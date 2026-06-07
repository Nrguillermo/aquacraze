<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ARC System Dashboard</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- ChartJS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* =========================
   GLOBAL
========================= */

body{
    background:linear-gradient(
        135deg,
        #e0f7fa 0%,
        #d6f4ff 35%,
        #edf9ff 100%
    );

    color:#083344;
    font-family:system-ui;
    overflow-x:hidden;
}

/* =========================
   NAVBAR
========================= */

.navbar{
    background:linear-gradient(
        90deg,
        #0f172a,
        #0f3b57,
        #0b5f75
    ) !important;

    border-bottom:3px solid #ff7849;

    box-shadow:0 6px 20px rgba(0,0,0,0.2);
}

.dashboard-title{
    font-size:24px;
    font-weight:700;
    color:#ffffff;
}

.dashboard-sub{
    color:#c7f9ff;
    font-size:13px;
}

/* =========================
   KPI CARDS
========================= */

.card-modern{

    background:rgba(255,255,255,0.72);

    border:1px solid rgba(8,145,178,0.12);

    border-radius:24px;

    backdrop-filter:blur(12px);

    box-shadow:
        0 10px 30px rgba(8,145,178,0.12),
        0 2px 10px rgba(0,0,0,0.04);

    transition:0.3s;
}

.card-modern:hover{

    transform:translateY(-6px);

    box-shadow:
        0 16px 40px rgba(8,145,178,0.18),
        0 6px 18px rgba(0,0,0,0.08);
}

/* =========================
   SENSOR ICONS
========================= */

.sensor-icon{
    width:60px;
    height:60px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
}

/* WATER + REDCLAW COLORS */

.temp-bg{
    background:rgba(255,120,73,0.15);
    color:#ff7849;
}

.ph-bg{
    background:rgba(14,165,233,0.15);
    color:#0284c7;
}

.tds-bg{
    background:rgba(6,182,212,0.15);
    color:#0891b2;
}

.turb-bg{
    background:rgba(59,130,246,0.15);
    color:#2563eb;
}

/* =========================
   SENSOR TEXT
========================= */

.sensor-label{
    color:#475569;
    font-size:14px;
    font-weight:600;
}

.sensor-value{
    font-size:34px;
    font-weight:800;
    color:#082f49;
}

/* =========================
   STATUS
========================= */

.status-badge{

    padding:8px 14px;

    border-radius:30px;

    background:rgba(34,197,94,0.12);

    color:#15803d;

    font-size:13px;

    font-weight:600;
}

/* =========================
   CHART
========================= */

.chart-card{
    padding:24px;
}

canvas{
    margin-top:10px;
}

/* =========================
   RAS FLOW
========================= */

.ras-flow{
    display:flex;
    align-items:center;
    justify-content:flex-start;
    gap:20px;
    overflow-x:auto;
    padding-bottom:10px;
    scrollbar-width:thin;
    flex-wrap:nowrap;
}

/* =========================
   SCROLLBAR
========================= */

.ras-flow::-webkit-scrollbar{
    height:8px;
}

.ras-flow::-webkit-scrollbar-thumb{
    background:rgba(14,165,233,0.3);
    border-radius:20px;
}

/* =========================
   FLOW BOX
========================= */

.flow-box{

    min-width:190px;
    max-width:190px;
    min-height:190px;

    border-radius:22px;

    padding:20px;

    text-align:center;

    background:linear-gradient(
        180deg,
        rgba(255,255,255,0.85),
        rgba(240,249,255,0.9)
    );

    border:1px solid rgba(8,145,178,0.12);

    box-shadow:
        0 8px 20px rgba(0,0,0,0.06),
        0 2px 10px rgba(8,145,178,0.08);

    transition:0.3s;

    position:relative;

    flex-shrink:0;
}

.flow-box:hover{

    transform:translateY(-6px) scale(1.03);

    box-shadow:
        0 14px 28px rgba(8,145,178,0.16),
        0 6px 14px rgba(0,0,0,0.08);
}

/* =========================
   FLOW ICON
========================= */

.flow-icon{

    width:65px;
    height:65px;

    margin:auto;
    margin-bottom:14px;

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;

    background:rgba(255,255,255,0.7);
}

/* =========================
   FLOW TEXT
========================= */

.flow-title{
    font-size:18px;
    font-weight:700;
    margin-bottom:8px;
    color:#082f49;
}

.flow-desc{
    color:#475569;
    font-size:13px;
    line-height:1.5;
}

/* =========================
   FLOW ARROWS
========================= */

.flow-arrow{
    font-size:34px;
    color:#0ea5e9;
    flex-shrink:0;
}

/* =========================
   RETURN
========================= */

.return-arrow{
    color:#ff7849;
    animation:spin 5s linear infinite;
}

/* =========================
   SENSOR TAG
========================= */

.sensor-tag{

    margin-top:12px;

    font-size:11px;

    background:rgba(14,165,233,0.12);

    color:#0369a1;

    padding:6px 10px;

    border-radius:30px;

    font-weight:600;
}

/* =========================
   FLOW COLORS
========================= */

.pond-box .flow-icon{
    color:#0284c7;
}

.vortex-box .flow-icon{
    color:#ff7849;
}

.mech-box .flow-icon{
    color:#7c3aed;
}

.bio-box .flow-icon{
    color:#16a34a;
}

.sump-box .flow-icon{
    color:#0891b2;
}

/* =========================
   ANIMATION
========================= */

@keyframes spin{

    from{
        transform:rotate(0deg);
    }

    to{
        transform:rotate(360deg);
    }

}

/* =========================
   MOBILE
========================= */

@media(max-width:768px){

    .sensor-value{
        font-size:28px;
    }

    .flow-box{
        min-width:170px;
        max-width:170px;
    }

}

</style>

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg px-4 py-3">

    <div class="container-fluid">

        <div>

            <div class="dashboard-title">
                ARC System
            </div>

            <div class="dashboard-sub">
                Australian Redclaw Crayfish Monitoring Dashboard
            </div>

        </div>

        <div class="status-badge">
            <i class="bi bi-wifi"></i>
            Live Monitoring
        </div>

    </div>

</nav>

<!-- =========================
     MAIN CONTENT
========================= -->

<div class="container py-4">

    <!-- SENSOR CARDS -->

    <div class="row g-4">

        <!-- TEMPERATURE -->

        <div class="col-12 col-sm-6 col-lg-3">

            <div class="card-modern p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="sensor-label">
                            Temperature
                        </div>

                        <div class="sensor-value" id="temp">
                            --
                        </div>

                        <small class="text-secondary">
                            °C
                        </small>

                    </div>

                    <div class="sensor-icon temp-bg">
                        <i class="bi bi-thermometer-half"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- PH -->

        <div class="col-12 col-sm-6 col-lg-3">

            <div class="card-modern p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="sensor-label">
                            pH Level
                        </div>

                        <div class="sensor-value" id="ph">
                            --
                        </div>

                    </div>

                    <div class="sensor-icon ph-bg">
                        <i class="bi bi-droplet-half"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- TDS -->

        <div class="col-12 col-sm-6 col-lg-3">

            <div class="card-modern p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="sensor-label">
                            TDS
                        </div>

                        <div class="sensor-value" id="tds">
                            --
                        </div>

                        <small class="text-secondary">
                            ppm
                        </small>

                    </div>

                    <div class="sensor-icon tds-bg">
                        <i class="bi bi-moisture"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- TURBIDITY -->

        <div class="col-12 col-sm-6 col-lg-3">

            <div class="card-modern p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="sensor-label">
                            Turbidity
                        </div>

                        <div class="sensor-value" id="turb">
                            --
                        </div>

                        <small class="text-secondary">
                            NTU
                        </small>

                    </div>

                    <div class="sensor-icon turb-bg">
                        <i class="bi bi-water"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- CHART -->

    <div class="card-modern chart-card mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">
                Sensor Analytics
            </h5>

            <div class="text-secondary small">
                Last 20 Readings
            </div>

        </div>

        <canvas id="chart" height="90"></canvas>

    </div>

    <!-- RAS FLOW -->

    <div class="card-modern mt-4 p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h5 class="mb-0">
                Recirculating Aquaculture System Flow
            </h5>

            <div class="text-secondary small">
                Horizontal Water Circulation
            </div>

        </div>

        <div class="ras-flow">

            <!-- POND -->

            <div class="flow-box pond-box">

                <div class="flow-icon">
                    <i class="bi bi-water"></i>
                </div>

                <div class="flow-title">
                    Culture Pond
                </div>

                <div class="flow-desc">
                    Main crayfish holding pond
                </div>

                <div class="sensor-tag">
                    Temp • pH • TDS • Turbidity
                </div>

            </div>

            <div class="flow-arrow">
                <i class="bi bi-arrow-right"></i>
            </div>

            <!-- VORTEX -->

            <div class="flow-box vortex-box">

                <div class="flow-icon">
                    <i class="bi bi-hurricane"></i>
                </div>

                <div class="flow-title">
                    Vortex Filter
                </div>

                <div class="flow-desc">
                    Removes large solids and sludge
                </div>

            </div>

            <div class="flow-arrow">
                <i class="bi bi-arrow-right"></i>
            </div>

            <!-- MECHANICAL -->

            <div class="flow-box mech-box">

                <div class="flow-icon">
                    <i class="bi bi-filter"></i>
                </div>

                <div class="flow-title">
                    Mechanical Filter
                </div>

                <div class="flow-desc">
                    Fine particle filtration stage
                </div>

            </div>

            <div class="flow-arrow">
                <i class="bi bi-arrow-right"></i>
            </div>

            <!-- BIO -->

            <div class="flow-box bio-box">

                <div class="flow-icon">
                    <i class="bi bi-flower1"></i>
                </div>

                <div class="flow-title">
                    Bio Filtration
                </div>

                <div class="flow-desc">
                    Beneficial bacteria converts ammonia
                </div>

            </div>

            <div class="flow-arrow">
                <i class="bi bi-arrow-right"></i>
            </div>

            <!-- SUMP -->

            <div class="flow-box sump-box">

                <div class="flow-icon">
                    <i class="bi bi-droplet"></i>
                </div>

                <div class="flow-title">
                    Sump Tank
                </div>

                <div class="flow-desc">
                    Water reservoir and recirculation
                </div>

            </div>

            <!-- RETURN -->

            <div class="flow-arrow return-arrow">
                <i class="bi bi-arrow-repeat"></i>
            </div>

        </div>

    </div>

</div>

<script>

/* =========================
   CHART
========================= */

const ctx = document.getElementById("chart");

const chart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [],
        datasets: [
            { label:"Temperature", data:[], borderColor:"#ff7849", tension:0.4 },
            { label:"pH", data:[], borderColor:"#0284c7", tension:0.4 },
            { label:"TDS", data:[], borderColor:"#0891b2", tension:0.4 },
            { label:"Turbidity", data:[], borderColor:"#2563eb", tension:0.4 }
        ]
    },
    options: { responsive:true }
});

/* =========================
   SAFE PARSE
========================= */

function safe(v){
    return (v === null || v === undefined || isNaN(v)) ? 0 : Number(v);
}

/* =========================
   IMPORTANT XAMPP FIX HERE
========================= */

const BASE_URL = window.location.origin + "/";

/* =========================
   LIVE DATA (FIXED PATH)
========================= */

async function fetchData(){

    try{

        const res = await fetch(BASE_URL + "api.php");
        const d = await res.json();

        document.getElementById("temp").innerText = safe(d.temperature).toFixed(1);
        document.getElementById("ph").innerText   = safe(d.ph).toFixed(2);
        document.getElementById("tds").innerText  = safe(d.tds).toFixed(0);
        document.getElementById("turb").innerText = safe(d.turbidity).toFixed(2);

    }
    catch(err){
        console.log("API ERROR:", err);
    }
}

/* =========================
   HISTORY (FIXED PATH)
========================= */

async function fetchHistory(){

    try{

        const res = await fetch(BASE_URL + "history.php");
        const data = await res.json();

        if(!Array.isArray(data)) return;

        chart.data.labels = data.map((_,i)=>i+1);

        chart.data.datasets[0].data = data.map(r=>safe(r.temperature));
        chart.data.datasets[1].data = data.map(r=>safe(r.ph));
        chart.data.datasets[2].data = data.map(r=>safe(r.tds));
        chart.data.datasets[3].data = data.map(r=>safe(r.turbidity));

        chart.update();

    }
    catch(err){
        console.log("HISTORY ERROR:", err);
    }
}

/* =========================
   LOOP
========================= */

async function refreshDashboard(){
    await fetchData();
    await fetchHistory();
}

refreshDashboard();
setInterval(refreshDashboard, 5000);

</script>

</body>
</html>