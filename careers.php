<?php include 'header.php'; 

require_once 'admin/config/config.php';

$db = getDbInstance();
$db->where('status', 'Open');
$db->orderBy('created_at', 'DESC');

$jobs = $db->get('jobs');
?>
<style>
  .hero{
    text-align:center;
    max-width:850px;
    margin:0 auto 70px;
     position: relative;
    padding: 10px 0 10px 0;
    border-bottom: 1px solid var(--line);
}

.hero .sub{
    color:#666;
    font-size:16px;
}

.job-list{
    display:grid;
    grid-template-columns:1fr;
    gap:25px;
    margin-top:30px;
}

.job-card{
    width:100%;
    background:#fff;
    border:1px solid #e9e9e9;
    border-radius:18px;
    padding:30px;
    position:relative;
    overflow:hidden;
    transition:.35s ease;
}

.job-card:hover{
    transform:translateY(-5px);
    box-shadow:0 15px 35px rgba(0,0,0,.08);
}

.job-card:before{
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:6px;
    height:100%;
    background:linear-gradient(180deg,#ff5500,#ff8840);
}

.job-type{
    display:inline-block;
    background:#fff3ed;
    color:#ff5500;
    padding:7px 15px;
    border-radius:30px;
    font-weight:700;
    font-size:12px;
    margin-bottom:18px;
}

.job-title{
    font-size:24px;
    margin-bottom:18px;
    color:#111;
    line-height:1.3;
}

.job-meta{
    display:flex;
    flex-wrap:wrap;
    gap:18px;
    margin:18px 0;
    color:#666;
    font-size:15px;
}

.job-meta div{
    display:flex;
    align-items:center;
    gap:8px;
}

.job-desc{
    color:#555;
    line-height:1.8;
    font-size:15px;
    margin-bottom:25px;
}

.job-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin-top:25px;
    padding-top:20px;
    border-top:1px solid #eee;
}

.vacancy{
    font-weight:700;
    color:#111;
}

.apply-btn{
    background:#111;
    color:#fff;
    padding:12px 22px;
    border-radius:40px;
    transition:.3s;
    font-weight:700;
}

.apply-btn:hover{
    background:#ff5500;
    transform:translateY(-2px);
}

.career-bottom{
    margin-top:80px;
    text-align:center;
    background:#fff;
    border-radius:24px;
    padding:60px;
    border:1px solid #ececec;
}

.career-bottom h3{
    font-size:32px;
    color:#111;
    margin-bottom:15px;
    font-family:'Archivo';
}

.career-bottom p{
    max-width:650px;
    margin:auto;
    color:#666;
    margin-bottom:30px;
}

.notify-btn{
    display:inline-block;
    background:#ff5500;
    color:#fff;
    padding:15px 34px;
    border-radius:50px;
    font-weight:700;
    transition:.3s;
}

.notify-btn:hover{
    background:#111;
}

@media(max-width:992px){

.job-list{
    grid-template-columns:repeat(2,1fr);
}

.career-bottom{
    padding:40px;
}

}

@media(max-width:768px){

.job-list{
    grid-template-columns:1fr;
}

.job-meta{
    flex-direction:column;
    gap:10px;
}

.job-footer{
    flex-direction:column;
    align-items:flex-start;
}

.job-card{
    padding:22px;
}

.hero h1{
    font-size:40px;
}

}
.view-btn{
    background:#fff;
    border:1px solid #0d6efd;
    color:#0d6efd;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.view-btn:hover{
    background:#0d6efd;
    color:#fff;
}

.job-modal{
    display:none;
    position:fixed;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,.55);
    z-index:9999;
    overflow:auto;
}

.job-modal-content{
    background:#ffffff;
    width:70%;
    max-width:900px;
    max-height:85vh;
    overflow-y:auto;
    margin:40px auto;
    border-radius:18px;
    padding:35px;
    position:relative;
    animation:fadeIn .35s ease;
    box-shadow:0 20px 60px rgba(0,0,0,.18);
    border:1px solid #e9ecef;
}

/* Scrollbar */
.job-modal-content::-webkit-scrollbar{
    width:8px;
}

.job-modal-content::-webkit-scrollbar-track{
    background:#f3f4f6;
    border-radius:20px;
}

.job-modal-content::-webkit-scrollbar-thumb{
    background:#c5c5c5;
    border-radius:20px;
}

.job-modal-content::-webkit-scrollbar-thumb:hover{
    background:#999;
}

/* Heading */
.job-modal-content h2{
    font-size:28px;
    color:#1f2937;
    margin:0 0 20px;
    padding-bottom:15px;
    border-bottom:2px solid #f1f1f1;
}

/* Sub Headings */
.job-modal-content h4{
    margin:25px 0 12px;
    color:#0d6efd;
    font-size:18px;
    font-weight:600;
}

/* Information Rows */
.job-modal-content p{
    margin:10px 0;
    color:#555;
    font-size:15px;
    line-height:1.8;
}

.job-modal-content strong{
    color:#222;
    min-width:170px;
    display:inline-block;
}

/* Divider */
.job-modal-content hr{
    border:none;
    border-top:1px solid #ececec;
    margin:25px 0;
}

/* Close Button */
.close{
    position:absolute;
    right:18px;
    top:15px;
    width:38px;
    height:38px;
    background:#f5f5f5;
    border-radius:50%;
    text-align:center;
    line-height:38px;
    font-size:24px;
    color:#666;
    cursor:pointer;
    transition:.3s;
}

.close:hover{
    background:#dc3545;
    color:#fff;
    transform:rotate(90deg);
}

/* Apply Button */
.job-modal-content .apply-btn{
    display:inline-block;
    margin-top:25px;
    padding:12px 28px;
    background:#0d6efd;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-weight:600;
    transition:.3s;
}

.job-modal-content .apply-btn:hover{
    background:#084298;
    transform:translateY(-2px);
}

/* Mobile */
@media (max-width:768px){

.job-modal-content{
    width:95%;
    padding:20px;
    border-radius:12px;
}

.job-modal-content h2{
    font-size:22px;
}

.job-modal-content strong{
    display:block;
    margin-bottom:3px;
}

}

.close{
    position:absolute;
    right:20px;
    top:15px;
    font-size:32px;
    cursor:pointer;
    color:#666;
}

.close:hover{
    color:red;
}

.job-modal h2{
    margin-bottom:20px;
}

.job-modal p{
    margin-bottom:12px;
    line-height:1.7;
}

@keyframes fadeIn{
    from{
        transform:translateY(-20px);
        opacity:0;
    }
    to{
        transform:translateY(0);
        opacity:1;
    }
}

@media(max-width:768px){

.job-modal-content{
    width:95%;
    padding:20px;
}

}
</style>

<main>
<section class="careers" style="padding-top:10px;">

<div class="wrap">

    <div class="hero">

        <span class="kicker">Careers at CRMRS</span>

        <h1>
            Join our <span class="o">team</span>
        </h1>

        <p class="sub">
            Build products that help businesses recover, grow and succeed.
        </p>

        <p class="sub">
            Explore our latest openings below and become a part of CRMRS.
        </p>

    </div>


    <?php if(!empty($jobs)){ ?>

    <div class="job-list">

        <?php foreach($jobs as $job){ ?>

        <div class="job-card">

           <div class="job-card-content">

    <span class="job-type">
        <?php echo htmlspecialchars($job['employment_type']); ?>
    </span>

    <h2 class="job-title">
        <?php echo htmlspecialchars($job['job_title']); ?>
    </h2>

    <div class="job-meta">
        <div>🏢 <strong>Department:</strong> <?php echo htmlspecialchars($job['department']); ?></div>
        <div>📍 <strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></div>
        <div>💼 <strong>Experience:</strong> <?php echo htmlspecialchars($job['experience']); ?></div>
        <div>🎓 <strong>Education:</strong>
            <?php echo !empty($job['education']) ? htmlspecialchars($job['education']) : 'Not Specified'; ?>
        </div>
    </div>

</div>

<div class="job-footer">
    <button class="view-btn"
        onclick="openModal('modal<?php echo $job['id']; ?>')">
        View Details
    </button>

    <a href="job-details.php?id=<?php echo $job['id']; ?>" class="apply-btn">
        Apply Now →
    </a>
</div>


        </div>

        <?php } ?>

    </div>

    <?php } else { ?>

    <div class="panel">
        <div class="panel-row">
            <span class="dot"></span>
            <div>
                <h2>No Open Positions</h2>
                <p>We are not hiring at the moment. Please check back later.</p>
            </div>
        </div>
    </div>

    <?php } ?>


    <div class="career-bottom">

        <h3>Didn't find a suitable role?</h3>

        <p>
            We'd still love to hear from talented people. Send us your resume and we'll
            reach out when a suitable opportunity becomes available.
        </p>

        <a class="notify-btn"
           href="mailto:team@crmrecoverysoftware.com?subject=Career Opportunity">
            Notify Me →
        </a>

    </div>

</div>
<div id="modal<?php echo $job['id']; ?>" class="job-modal">
<div class="job-modal-content" style="background:#fff;width:95%;max-width:850px;margin:30px auto;border-radius:12px;padding:30px;box-shadow:0 10px 30px rgba(0,0,0,0.15);position:relative;box-sizing:border-box;font-family:Arial,sans-serif;">

    <!-- Close Button -->
    <span
        onclick="closeModal('modal<?php echo $job['id']; ?>')"
        style="position:absolute;top:15px;right:20px;font-size:32px;font-weight:bold;color:#999;cursor:pointer;">
        &times;
    </span>

    <!-- Job Title -->
    <h2 style="margin:0 0 25px;color:#222;font-size:30px;border-bottom:2px solid #28a745;padding-bottom:12px;">
        💼 <?php echo htmlspecialchars($job['job_title']); ?>
    </h2>

    <!-- Job Information -->
    <div style="display:flex;flex-direction:column;gap:15px;">

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">🏢 Department</strong><br>
            <?php echo htmlspecialchars($job['department']); ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">📍 Location</strong><br>
            <?php echo htmlspecialchars($job['location']); ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">🏠 Work Mode</strong><br>
            <?php echo htmlspecialchars($job['work_mode']); ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">💼 Experience</strong><br>
            <?php echo htmlspecialchars($job['experience']); ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">🎓 Education</strong><br>
            <?php echo !empty($job['education']) ? htmlspecialchars($job['education']) : 'Not Specified'; ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">👥 Vacancies</strong><br>
            <?php echo htmlspecialchars($job['vacancies']); ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">💰 Salary</strong><br>
            <?php echo !empty($job['salary']) ? htmlspecialchars($job['salary']) : 'Negotiable'; ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">📅 Application Deadline</strong><br>
            <?php
            echo !empty($job['application_deadline'])
                ? date('d M Y', strtotime($job['application_deadline']))
                : 'Open Until Filled';
            ?>
        </div>

        <div style="background:#f8f9fa;padding:15px 18px;border-radius:8px;border-left:4px solid #28a745;">
            <strong style="color:#28a745;">📌 Status</strong><br><br>
            <span style="background:#28a745;color:#fff;padding:6px 15px;border-radius:20px;font-size:14px;">
                <?php echo htmlspecialchars($job['status']); ?>
            </span>
        </div>

    </div>

    <!-- Skills -->
    <div style="margin-top:30px;">
        <h3 style="margin-bottom:12px;color:#28a745;border-left:5px solid #28a745;padding-left:10px;">
            ⭐ Skills Required
        </h3>

        <div style="background:#f8f9fa;padding:18px;border-radius:8px;line-height:1.8;color:#555;">
            <?php echo nl2br(htmlspecialchars($job['skills'])); ?>
        </div>
    </div>

    <!-- Description -->
    <div style="margin-top:30px;">
        <h3 style="margin-bottom:12px;color:#28a745;border-left:5px solid #28a745;padding-left:10px;">
            📄 Job Description
        </h3>

        <div style="background:#f8f9fa;padding:18px;border-radius:8px;line-height:1.8;color:#555;">
            <?php echo nl2br(htmlspecialchars($job['job_description'])); ?>
        </div>
    </div>

    <!-- Apply Button -->
    <div style="text-align:center;margin-top:35px;">

        <a href="job-details.php?id=<?php echo $job['id']; ?>"
           style="display:inline-block;background:#28a745;color:#fff;text-decoration:none;padding:15px 45px;border-radius:50px;font-size:17px;font-weight:bold;box-shadow:0 8px 20px rgba(40,167,69,.3);">
            🚀 Apply Now
        </a>

    </div>

</div>
</div>
</section>
</main>



<?php include 'footer.php'; ?>

  <script>
function openModal(id){
    document.getElementById(id).style.display='block';
}

function closeModal(id){
    document.getElementById(id).style.display='none';
}

window.onclick=function(event){

    document.querySelectorAll('.job-modal').forEach(function(modal){

        if(event.target==modal){
            modal.style.display='none';
        }

    });

}
</script>