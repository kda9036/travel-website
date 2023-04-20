        <button onclick="toggle()" id="ham-button" class="ham-button"><i class="fas fa-bars"></i></button>
        <nav id="menu" class="menu" style="">
            <ul>
                <li <?php echo (isset($page) && $page=='Alexandria Bay, NY') ? ' class="active main-menu" ' :'class="main-menu"' ?>><a href="<?php echo $path; ?>index.php">Home</a></li>
                <li <?php echo (isset($page) && $page=='Explore ABay') ? ' class="active main-menu" ' :'class="main-menu"' ?>>
                    <div><a href="<?php echo $path; ?>explore.php">Explore</a></div>
                    <ul>
                        <li <?php echo (isset($page) && $page=='Boldt Castle') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>castle.php">Boldt Castle</a></li>
                        <li <?php echo (isset($page) && $page=='Uncle Sam Boat Tours') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>unclesam.php">Uncle Sam Boat Tours</a></li>
                        <li <?php echo (isset($page) && $page=='Thousand Islands Winery') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>winery.php">Thousand Islands Winery</a></li>
                        <li <?php echo (isset($page) && $page=='Bay Drive-in Theatre') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>drivein.php">Bay Drive-in Theatre</a></li>
                    </ul>
                </li>
                <li <?php echo (isset($page) && $page=='ABay Events') ? ' class="active main-menu" ' :'class="main-menu"' ?>><a href="<?php echo $path; ?>events.php">Events</a></li>
                <li <?php echo (isset($page) && $page=='ABay Dining') ? ' class="active main-menu" ' :'class="main-menu"' ?>><a href="<?php echo $path; ?>dining.php">Restaurants</a></li>
                <li <?php echo (isset($page) && $page=='Visitor Survey') ? ' class="active main-menu" ' :'class="main-menu"' ?>><a href="<?php echo $path; ?>comments.php">Feedback</a></li>
                <li <?php echo (isset($page) && $page=='Website References') ? ' class="active main-menu" ' :'class="main-menu"' ?>>
                    <div><a href="<?php echo $path; ?>references.php">References</a></div>
                    <ul>
                        <li <?php echo (isset($page) && $page=='Website References') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>references.php">References Page</a></li>
                        <li <?php echo (isset($page) && $page=='Grading Page') ? ' class="active" ' :'' ?>><a href="<?php echo $path; ?>grading.php">Grading Page</a></li>
                    </ul>
                </li>
            </ul>
        </nav>        
        </div>