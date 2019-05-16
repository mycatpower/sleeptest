<?php get_header(); 
/* Template Name: Homepage Template */?> 

<section class="home-hero">
    <div class="container">
        <div class="sleep-text-hidden">
            SleepTest
        </div>
        <div class="row">
            <div class="col-xl-6">                
            </div>
            <div class="col-xl-6">
                <div class="hero-home-text">
                   <?php echo get_field( "home_hero_title" ); ?>
                    <div class="after-header">
                        <?php echo get_field( "home_hero_after_title" ); ?>
                    </div>
                        <a class="take_test_btn" href="<?php echo get_field('link_take_a_test_btn','option');?>">Take a Test</a>
                </div>
            </div>
        </div>
        <div class="sleep-explore">
            <div class="scroll-explore"></div>
            <div class="text-explore">
                explore
            </div>             
        </div>
    </div>
</section>
<section class="problem-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="sec-content">
                    <div class="before-title">
                        <?php echo get_field( "problem_section_before_title" ); ?>
                        
                    </div>
                        <?php echo get_field( "problem_section_title" ); ?>                    
                    <div class="sec-text-content">
                        <?php echo get_field( "problem_section_content" ); ?>                          
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="main-image">
                    <?php 
                        $image = get_field('problem_section_image');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        // var_dump($image);
                    ?>
                    <img src="<?php  echo get_field('problem_section_image'); ?>" alt="">
                </div>
                    <img src="/wp-content/uploads/2019/04/decoration.png" alt="" class="beh-img" width='310px' height='310px'>
            </div>
        </div>
    </div>
</section>
<section class="testing-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="sec-content">
                    <div class="before-title">
                        testing
                    </div>
                    <h2>
                        let's take a test and find out the cause of your problem
                    </h2>
                    <div class="sec-text-content">
                        <p>If you suspect that you have Obstructive Sleep Apnoea, then an in-home Sleep Test provides a quick,
                        convenient and affordable way to have it confirmed. Within two weeks you could be able to begin treatment
                        and enjoying deep, restorative sleep again. All studies are independently analysed by experienced NHS-qualified
                        sleep professionals, and use the WatchPAT recording device for unrivalled accuracy.</p>                        
                        <p>If you are concerned you may have Sleep Apnoea and want to take a Sleep Test - then order yours here.</p>
                    </div>
                    <div class="test-btn">
                        <a href="<?php echo get_field('link_take_a_test_btn','option');?>" class="btn_more_articles">Take a Test</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">

            </div>
        </div>
    </div>
</section>
<section class="obstructive-sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 left-block">
                <img src="/wp-content/uploads/2019/04/obstructive-new.jpg" alt="">
            </div>
            <div class="col-xl-4 right-block">
                <img src="/wp-content/uploads/2019/03/bg_latest.png" alt="" width="231px" height="408px" class="bg-square">
                <div class="content-square">                
                    <div class="sec-content">
                        <h2>
                            Obstructive Sleep Apnoea Symptoms
                        </h2>
                        <div class="sec-text-content">
                            <ul>
                                <li>
                                    Gasping or choking during sleep
                                </li>
                                <li>
                                    Snoring
                                </li>
                                <li>
                                    Feeling excessively tired during the day
                                </li>
                                <li>
                                    Anxiety
                                </li>
                                <li>
                                    Depression
                                </li>
                                <li>
                                    High Blood Pressure
                                </li>
                                <li>
                                    Lack of interest in sex
                                </li>
                                <li>
                                    Irritability and a short temper
                                </li>
                            </ul>
                        </div>
                        <a href="/obstructive-sleep-apnoea/" class="more-info">
                            <span>More info</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="statistics-sec">
    <div class="container">
        <div class="row stat-row">
            <h3>
                Key Obstructive Sleep Apnoea Statistics
            </h3>
        </div>
        <div class="row">
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                        25,000,000
                    </h5>
                    <span>
                        snorers in the UK - 40% of the population
                    </span>
                </div>                
            </div>
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                    5%
                    </h5>
                    <span>
                    of the UK adult population thought to have undiagnosed OSA2 - over 2.5 million people
                    </span>
                </div>                
            </div>
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                        75,000
                    </h5>
                    <span>
                        NHS sleep studies conducted annually
                    </span>
                </div>                
            </div>
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                        250,000
                    </h5>
                    <span>
                         men have Severe OSA in the UK
                    </span>
                </div>                
            </div>
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                    100,000,000
                    </h5>
                    <span>
                    people believe to have OSA worldwide
                    </span>
                </div>                
            </div>
            <div class="col-xl-2">
                <div class="stat-block">
                    <h5>
                    26%
                    </h5>
                    <span>
                    of commercial drivers have OSA
                    </span>
                </div>                
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
            <div class="test-btn">
                        <a href="<?php echo get_field('link_take_a_test_btn','option');?>" class="btn_more_articles">Take a Test</a>
                    </div>
            </div>
        </div>
    </div>
</section>
<section class="apnoea-sec">
    <div class="container">
        <div class="row">
        <div class="col-xl-8">
                <div class="sec-content">
                    
                    <h2>
                        Obstructive Sleep Apnoea Treatments
                    </h2>
                    <div class="sec-text-content">
                        <p>Should a Sleep Test confirm the presence of OSA, there are a number of clinically proven treatments available.</p>
                        <ol>
                            
                            <li>
                                CPAP (Continuous Positive Airway Pressure)
                            </li>
                            <li>
                                OAT (Oral Appliance Therapy)
                            </li>
                            <li>
                                Positional Therapy
                            </li>
                            <li>
                                Nutrition, lifestyle and weight loss
                            </li>
                        </ol>
                    </div>
                    
                    <a href="/obstructive-sleep-apnoea/" class="more-info">
                            <span>More info</span>
                        </a>
                </div>
            </div>
            <div class="col-xl-4">

            </div>
        </div>
    </div>
</section>
<section class="product-sec">    
            <?php echo do_shortcode( '[products limit="1"]' );?> 
</section>
<section class="about-us-block">
<div class="layer">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="sec-content">
                    <div class="before-title">
                        About Us
                    </div>
                    <h2>
                     Why choose an in-home sleep test from SleepTest.co.uk?
                    </h2>
                    <div class="sec-text-content">
                        <p>Intus Healthcare pioneered in-home sleep tests over a decade ago, and 
                            have since helped over 100,000 customers with their sleep.</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-6">
                <div class="content-about-sec">
                    <div class="row row-no-pad">
                        <div class="col-xl-2">
                            <img src="/wp-content/uploads/2019/04/vector.png"  width="50px" height="50px" alt="">
                        </div>
                        <div class="col-xl-10">
                            <h4>
                                Confidential
                            </h4>
                            <p>
                                We only send your results to you; not your GP, the DVLA, or anyone else. Your results are yours, and yours alone.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-about-sec">
                    <div class="row row-no-pad">
                        <div class="col-xl-2">
                            <img src="/wp-content/uploads/2019/04/vector2.png"  width="50px" height="50px" alt="">
                        </div>
                        <div class="col-xl-10">
                            <h4>
                            Professionalism
                            </h4>
                            <p>
                            We guarantee every test is scored by a qualified sleep professional with a minimum of five years experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 ">
                <div class="content-about-sec">
                    <div class="row row-no-pad">
                        <div class="col-xl-2">
                            <img src="/wp-content/uploads/2019/04/result.png"  width="50px" height="50px" alt="">
                        </div>
                        <div class="col-xl-10">
                            <h4>
                                Speed
                            </h4>
                            <p>
                            We return results within 7 days of the equipment being received back - and refund 10% for every day we go over this deadline
                            </p>
                        </div>
                    </div>
                </div>
                <div class="content-about-sec">
                    <div class="row row-no-pad">
                        <div class="col-xl-2">
                            <img src="/wp-content/uploads/2019/04/target.png"  width="50px" height="50px" alt="">
                        </div>
                        <div class="col-xl-10">
                            <h4>
                            Accuracy Results
                            </h4>
                            <p>
                            We use WatchPat devices for all our tests. No device has more clinical-validation for its accuracy for in-home testing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row row-no-pad">
            <div class="col-xl-12">
                <div class="test-btn">
                    <a href="abot-us" class="btn_more_articles">About Us</a>
                </div>
            </div> 
        </div>
        
    </div>
</section>
<section class="review-sec">
    <div class="container">
        <div class="row">
            <script src="https://widget.reviews.co.uk/rich-snippet-reviews-widgets/dist.js"></script>
            <div id="carousel-inline-widget-810" style="width:100%;max-width:810px;margin:0 auto;"></div>
            <script>
                richSnippetReviewsWidgets('carousel-inline-widget-810', {
                    store: 'intus-healthcare',
                    widgetName: 'carousel-inline',
                    primaryClr: '#f47e27',
                    neutralClr: '#f4f4f4',
                    reviewTextClr:'#2f2f2f',
                    ratingTextClr:'#2f2f2f',
                    layout:'fullWidth',
                    numReviews: 21
                });
            </script>
        </div>
    </div>
</section>

<?php require get_template_directory() . '/latest_articles.php'; ?>


<?php echo do_shortcode('[contact_form_home]'); ?>
<?php get_footer(); ?>