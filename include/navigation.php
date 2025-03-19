<nav class="topbar">
	<div>
        <a class="toggleSidebar" onclick="toggleNav()"><i class="fas fa-solid fa-bars"></i></a>
		<h1 style="display: block ruby; margin-top: 8px">Steinzeit - Projektmanagement</h1>
        <div id="successMessage" style="display: none; padding-top: 4px;padding-bottom: 4px;">
            <div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
            <button type="button" class="close font__size-18" data-dismiss="alert">
            </button>
            <i class="start-icon far fa-check-circle wt-tada animated"></i>
            <strong>Alles im grünen Bereich!</strong> Datensatz erfolgreich aktualisiert.
            </div>
        </div>
		<a href="/settings/profile"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="/settings"><i class="fas fa-cog"></i> Einstellungen</a>
		<a href="/logout.php"><i class="fas fa-sign-out-alt"></i> Abmelden</a>
    </div>
</nav>
<nav class="sidebar">
    <div class="logo_nav">
            <img src="/images/logo/logo_steinzeit.png">
    </div>
    <ul class="no_bullets">
        <li><a href="/dashboard"><i class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
        <li><a href="/projects"><i class="fa-solid fa-diagram-project"></i> Projekte</a></li>
        <?php if($_SESSION['function'] == 1) {?>
        <!--<li><a href="/customer"><i class="fas fa-user-friends"></i> Kunden</a></li>        -->
        <li><a href="/article"><i class="fa-solid fa-basket-shopping"></i> Artikel</a></li>
        
        <li><a href="/hours"><i class="fa-solid fa-clock"></i> Stunden</a></li>
        <?php } ?>
    </ul>
</nav>

<script>
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function toggleNav() {
    if($('.sidebar').css('display') === 'none'){
        document.getElementsByClassName("sidebar")[0].style.display = 'block';
        document.getElementsByClassName("topbar")[0].style.paddingLeft = '200px';
        document.getElementsByClassName("content")[0].style.marginLeft = '200px';
    }else{
        document.getElementsByClassName("sidebar")[0].style.display = 'none';
        document.getElementsByClassName("topbar")[0].style.paddingLeft = '0';
        document.getElementsByClassName("content")[0].style.marginLeft = '0';
    }
  
}

</script>