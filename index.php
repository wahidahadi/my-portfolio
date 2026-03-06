<?php
// ----------------- Contact Form Handling -----------------
$contactSuccess = '';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "youremail@example.com"; // ایمیل خودتان را اینجا بگذارید
    $subject = "New Contact Form Message from Portfolio";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-type: text/html;charset=UTF-8";

    $body = "<h3>New Message from Portfolio Contact Form</h3>
             <p><strong>Name:</strong> $name</p>
             <p><strong>Email:</strong> $email</p>
             <p><strong>Message:</strong><br>$message</p>";

    if(mail($to,$subject,$body,$headers)){
        $contactSuccess = "پیام شما با موفقیت ارسال شد!";
    } else {
        $contactSuccess = "خطا در ارسال پیام. لطفاً دوباره تلاش کنید.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP Developer Portfolio</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<style>
/* CSS همانند نسخه قبلی با Hero, Navbar, Sections, Footer, Animations و Responsive */
body{font-family:'Roboto',sans-serif;scroll-behavior:smooth;background:#f8f9fa;color:#333;}
a{text-decoration:none;}
.navbar{position:fixed;top:0;left:0;width:100%;background:#0d6efd;padding:15px 20px;z-index:1000;display:flex;justify-content:space-between;align-items:center;}
.navbar .logo{color:white;font-weight:bold;font-size:22px;}
.navbar ul{list-style:none;display:flex;gap:20px;}
.navbar ul li a{color:white;font-weight:500;transition:0.3s;}
.navbar ul li a.active, .navbar ul li a:hover{color:#ffeb3b;}
.navbar .menu-toggle{display:none;font-size:25px;color:white;cursor:pointer;}
.hero{height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;background:linear-gradient(-45deg,#0d6efd,#6610f2,#6f42c1,#0dcaf0);background-size:400% 400%;animation:gradientBG 15s ease infinite;color:white;opacity:0;transform:translateY(50px);transition:1s;}
.hero h1{font-size:50px;font-weight:bold;}
.hero p{font-size:22px;margin-top:15px;}
.hero .cta-buttons{margin-top:25px; display:flex; gap:20px;}
.hero .cta-buttons a{padding:12px 25px;border-radius:5px;background:#ffeb3b;color:#0d6efd;font-weight:bold;transition:0.3s;}
.hero .cta-buttons a:hover{background:#ffc107; color:#0a3b70;}
.section{padding:80px 20px;opacity:0;transform:translateY(50px);transition:1s;}
.text-center{text-align:center;}
#contact form{max-width:600px;margin:0 auto;display:flex;flex-direction:column;gap:15px;opacity:0;transform:translateY(50px);}
#contact input,#contact textarea{padding:12px;border-radius:5px;border:1px solid #ccc;font-size:16px;}
#contact button{padding:12px;border:none;background:#0d6efd;color:white;font-size:18px;border-radius:5px;cursor:pointer;transition:0.3s;}
#contact button:hover{background:#094aac;}
.footer{background:#111;color:white;text-align:center;padding:25px 0;}
.footer a{color:#ffeb3b;margin:0 10px;}
.footer a:hover{text-decoration:underline;}
@keyframes gradientBG{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
@media(max-width:768px){.navbar ul{flex-direction:column;background:#0d6efd;position:absolute;top:60px;right:-100%;width:100%;transition:0.3s;}.navbar ul.show{right:0;}.navbar .menu-toggle{display:block;}}
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <a href="#" class="logo">PHP Portfolio</a>
    <span class="menu-toggle"><i class="fa fa-bars"></i></span>
    <ul>
        <li><a href="#about">About</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#testimonials">Testimonials</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<section class="hero">
    <h1>Hi, I'm a <span id="typed"></span></h1>
    <p>Building modern web applications</p>
    <div class="cta-buttons">
        <a href="mailto:youremail@example.com">Hire Me</a>
        <a href="https://www.fiverr.com/yourusername" target="_blank">Fiverr</a>
        <a href="https://www.upwork.com/freelancers/~yourusername" target="_blank">Upwork</a>
        <a href="resume.pdf" download>Download Resume PDF</a>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section text-center">
    <h2>Contact Me</h2>
    <?php if($contactSuccess){echo "<p style='color:green;font-weight:bold;'>$contactSuccess</p>";} ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
        <button type="submit" name="contact_submit">Send Message</button>
    </form>
</section>

<!-- Footer -->
<footer class="footer">
<p>© 2026 PHP Portfolio | 
<a href="#" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a> | 
<a href="#" target="_blank"><i class="fab fa-github"></i> GitHub</a> | 
<a href="https://www.fiverr.com/yourusername" target="_blank"><i class="fas fa-handshake"></i> Fiverr</a> | 
<a href="https://www.upwork.com/freelancers/~yourusername" target="_blank"><i class="fas fa-briefcase"></i> Upwork</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>
<script>
window.addEventListener('load', ()=>{document.getElementById('preloader')?.remove();});
var typed = new Typed('#typed', { strings: ["PHP Developer","Full-Stack Developer","Web App Expert"], typeSpeed:60, backSpeed:40, loop:true });
const menuToggle = document.querySelector('.menu-toggle'); const navUl = document.querySelector('.navbar ul');
menuToggle.addEventListener('click', ()=>{ navUl.classList.toggle('show'); });
document.querySelectorAll('.navbar a').forEach(anchor=>{anchor.addEventListener('click', function(e){e.preventDefault();document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior:'smooth' });navUl.querySelectorAll('a').forEach(a=>a.classList.remove('active'));this.classList.add('active');if(navUl.classList.contains('show')) navUl.classList.remove('show');});});
var swiper = new Swiper('.swiper',{ loop:true, autoplay:{ delay:4000 }, pagination:{ el:'.swiper-pagination', clickable:true }});
ScrollReveal().reveal('.hero',{ duration:1000, origin:'bottom', distance:'50px', opacity:0.2, delay:200 });
ScrollReveal().reveal('.section',{ duration:1000, origin:'bottom', distance:'50px', opacity:0.2, interval:200 });
ScrollReveal().reveal('.project-card',{ duration:1000, origin:'bottom', distance:'50px', opacity:0.2, interval:200 });
ScrollReveal().reveal('#contact form',{ duration:1000, origin:'bottom', distance:'50px', opacity:0.2 });
</script>
</body>
</html>
