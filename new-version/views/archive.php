<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Kai Jun Wong">
    <meta name="author" content="Duc Vinh Vu">
    <meta name="author" content="Shawn Hatten">
    <title>Art Design Blog Archive</title>
    <link rel="stylesheet" href="public/Styles/style.css">
</head>

<body>

    <!-- header -->
    <header>
        <nav class="navbar">
            <div class="container">
            <div style="position: relative;">
                    <img id="banner-image" class="banner-home" img src="public/images/banner-bg.jpg" alt="" />
                    <?php include 'components/search_form.php'; ?>
                </div>
                <h1>Blog Archive</h1>
                <?php include 'components/menu.php'; ?>
            </div>
        </nav>
    </header>

    <!-- end of header -->

    <!-- blog -->
    <section class="archive-blog" id="archive-blog">
        <div class="title">
            <h2>Latest blog</h2>
            <p>Recent blogs about art & design</p>
        </div>
        <!-- blog 1 -->
        <div class="blog-title">
            <h2>Archive: Crafting Culture: Exploring Traditional Artisan Techniques</h2>
            <div class="archive-expand">
                <button type="button" onclick="togglePostVisibility(1)">Expand</button>
            </div>
        </div>
        <div class="blog-content">
            <p hidden>enim ut tellus elementum sagittis vitae et leo duis ut diam quam nulla porttitor massa id neque
                aliquam
                vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque
                elit
                eget gravida cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus
                mauris
                vitae ultricies leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel
                facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit amet
                nisl
                suscipit adipiscing bibendum est ultricies integer quis auctor elit sed vulputate mi sit amet mauris
                commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin
                libero
                nunc consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus
                accumsan tortor posuere ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                amet
                dictum sit amet justo donec enim diam vulputate ut pharetra sit amet aliquam id diam maecenas
                ultricies
                mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam
                adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices
                dui
                sapien eget mi proin sed libero enim sed faucibus turpis in eu mi bibendum</p>
        </div>
        <div class="blog-creation">
            <p>9/05/2024</p>
        </div>
        <div class="blog-tag">
            <p>cultural preservation</p>
            <p>artisan crafts</p>
        </div>
        <!-- end of blog 1 -->

        <!-- blog 2 -->
        <div class="blog-title">
            <h2>Archive: Sculpting Serenity: The Intersection of Art and Wellness</h2>
            <div class="archive-expand">
                <button type="button" onclick="togglePostVisibility(2)">Expand</button>
            </div>
        </div>
        <div class="blog-content">
            <p hidden>enim ut tellus elementum sagittis vitae et leo duis ut diam quam nulla porttitor massa id neque
                aliquam
                vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque
                elit
                eget gravida cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus
                mauris
                vitae ultricies leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel
                facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit amet
                nisl
                suscipit adipiscing bibendum est ultricies integer quis auctor elit sed vulputate mi sit amet mauris
                commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin
                libero
                nunc consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus
                accumsan tortor posuere ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                amet
                dictum sit amet justo donec enim diam vulputate ut pharetra sit amet aliquam id diam maecenas
                ultricies
                mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam
                adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices
                dui
                sapien eget mi proin sed libero enim sed faucibus turpis in eu mi bibendum</p>
        </div>
        <div class="blog-creation">
            <p>8/05/2024</p>
        </div>
        <div class="blog-tag">
            <p>mindfulness</p>
            <p>healing through art</p>
        </div>
        <!-- end of blog 2 -->

        <!-- blog 3 -->
        <div class="blog-title">
            <h2> Archive: Fashion Forward: Trends in Wearable Art and Couture</h2>
            <div class="archive-expand">
                <button type="button" onclick="togglePostVisibility(3)">Expand</button>
            </div>
        </div>
        <div class="blog-content">
            <p hidden>enim ut tellus elementum sagittis vitae et leo duis ut diam quam nulla porttitor massa id neque
                aliquam
                vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque
                elit
                eget gravida cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus
                mauris
                vitae ultricies leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel
                facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit amet
                nisl
                suscipit adipiscing bibendum est ultricies integer quis auctor elit sed vulputate mi sit amet mauris
                commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin
                libero
                nunc consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus
                accumsan tortor posuere ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                amet
                dictum sit amet justo donec enim diam vulputate ut pharetra sit amet aliquam id diam maecenas
                ultricies
                mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam
                adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices
                dui
                sapien eget mi proin sed libero enim sed faucibus turpis in eu mi bibendum</p>
        </div>
        <div class="blog-creation">
            <p>7/05/2024</p>
        </div>
        <div class="blog-tag">
            <p>fashion trends</p>
            <p>wearable art</p>
        </div>
        <!-- end of blog 3 -->

        <!-- blog 4 -->
        <div class="blog-title">
            <h2> Archive: Architectural Marvels: Iconic Structures and Design Concepts</h2>
            <div class="archive-expand">
                <button type="button" onclick="togglePostVisibility(4)">Expand</button>
            </div>
        </div>
        <div class="blog-content">
            <p hidden>enim ut tellus elementum sagittis vitae et leo duis ut diam quam nulla porttitor massa id neque
                aliquam
                vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque
                elit
                eget gravida cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus
                mauris
                vitae ultricies leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel
                facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit amet
                nisl
                suscipit adipiscing bibendum est ultricies integer quis auctor elit sed vulputate mi sit amet mauris
                commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin
                libero
                nunc consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus
                accumsan tortor posuere ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                amet
                dictum sit amet justo donec enim diam vulputate ut pharetra sit amet aliquam id diam maecenas
                ultricies
                mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam
                adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices
                dui
                sapien eget mi proin sed libero enim sed faucibus turpis in eu mi bibendum</p>
        </div>
        <div class="blog-creation">
            <p>6/05/2024</p>
        </div>
        <div class="blog-tag">
            <p>urban landscapes</p>
            <p>architectural wonders</p>
        </div>
        <!-- end of blog 4 -->

         <!-- blog 5 -->
         <div class="blog-title">
            <h2> Archive: Artful Living: Integrating Art and Design into Everyday Spaces</h2>
            <div class="archive-expand">
                <button type="button" onclick="togglePostVisibility(5)">Expand</button>
            </div>
        </div>
        <div class="blog-content">
            <p hidden>enim ut tellus elementum sagittis vitae et leo duis ut diam quam nulla porttitor massa id neque
                aliquam
                vestibulum morbi blandit cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque
                elit
                eget gravida cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus
                mauris
                vitae ultricies leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel
                facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit amet
                nisl
                suscipit adipiscing bibendum est ultricies integer quis auctor elit sed vulputate mi sit amet mauris
                commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin
                libero
                nunc consequat interdum varius sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus
                accumsan tortor posuere ac ut consequat semper viverra nam libero justo laoreet sit amet cursus sit
                amet
                dictum sit amet justo donec enim diam vulputate ut pharetra sit amet aliquam id diam maecenas
                ultricies
                mi eget mauris pharetra et ultrices neque ornare aenean euismod elementum nisi quis eleifend quam
                adipiscing vitae proin sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec ultrices
                dui
                sapien eget mi proin sed libero enim sed faucibus turpis in eu mi bibendum</p>
        </div>
        <div class="blog-creation">
            <p>5/05/2024</p>
        </div>
        <div class="blog-tag">
            <p>design inspiration</p>
            <p>art integration</p>
        </div>
        <script src="public/js/archive.js"></script>
        <!-- end of blog 5 -->
    </section>

    <!-- end of Archive -->

    <!-- footer -->
    <footer>
        <div class="footer">
            <p>Art Design Blog Page</p>
        </div>
    </footer>
    <!-- end of footer -->
</body>

</html>