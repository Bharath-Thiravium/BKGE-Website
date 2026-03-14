<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK Green Energy - Portfolio</title>
    
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">

    <style>
        :root { --primary-green: #8bc34a; --dark-green: #2e7d32; }
        body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; margin: 0; }
        .portfolio-section { padding: 60px 20px; text-align: center; }
        .filter-nav { margin-bottom: 40px; }
        .filter-btn { 
            padding: 10px 25px; margin: 5px; cursor: pointer; border-radius: 50px;
            border: 2px solid var(--primary-green); background: white; color: var(--dark-green);
            font-weight: bold; transition: 0.3s;
        }
        .filter-btn.active, .filter-btn:hover { background: var(--primary-green); color: white; }
        .project-grid { 
            display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
            gap: 20px; max-width: 1200px; margin: 0 auto;
        }
        .project-card { 
            background: #fff; border-radius: 12px; padding: 20px; text-align: left;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-bottom: 4px solid var(--primary-green);
        }
        .tag { background: #e8f5e9; color: var(--dark-green); padding: 4px 10px; border-radius: 4px; font-size: 0.8rem; }
    </style>
</head>
<body>

<section class="portfolio-section">
    <div class="filter-nav">
        <button class="filter-btn active" onclick="filterProjects('all', this)">All Projects</button>
        <button class="filter-btn" onclick="filterProjects('utility', this)">Utility Scale</button>
        <button class="filter-btn" onclick="filterProjects('ci', this)">C & I Solutions</button>
    </div>

    <div class="project-grid" id="mainGrid"></div>
</section>

<script>
// Sample project data - replace with your actual projects
const solarProjects = [
    {
        cat: 'utility',
        epc: 'Siemens',
        title: 'Desert Sunlight Solar Farm',
        loc: 'California, USA'
    },
    {
        cat: 'utility',
        epc: 'GE',
        title: 'Copper Mountain Solar',
        loc: 'Nevada, USA'
    },
    {
        cat: 'ci',
        epc: 'Schneider Electric',
        title: 'Retail Center Rooftop',
        loc: 'Austin, Texas'
    },
    {
        cat: 'utility',
        epc: 'First Solar',
        title: 'Topaz Solar Farm',
        loc: 'California, USA'
    },
    {
        cat: 'ci',
        epc: 'SunPower',
        title: 'Manufacturing Plant',
        loc: 'Detroit, Michigan'
    },
    {
        cat: 'ci',
        epc: 'Tesla',
        title: 'Shopping Mall Installation',
        loc: 'Miami, Florida'
    }
];

// Function to render projects
function renderProjects(projects) {
    const grid = document.getElementById('mainGrid');
    grid.innerHTML = projects.map(p => `
        <div class="project-card" data-cat="${p.cat}">
            <span class="tag">${p.epc} EPC Partner</span>
            <h4 style="margin: 15px 0 5px;">${p.title}</h4>
            <p style="margin: 0; color: #666;">📍 ${p.loc}</p>
        </div>
    `).join('');
}

// Filter function
function filterProjects(category, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    if (category === 'all') {
        renderProjects(solarProjects);
    } else {
        const filtered = solarProjects.filter(p => p.cat === category);
        renderProjects(filtered);
    }
}

// Initial render
renderProjects(solarProjects);
</script>

</body>
</html>