<?php
/**
 * Home page all fancy pants
 *
 * @package Proximo
 */

get_header();

?>

<section>
<div style="margin-left:32px"> All Posts: by Year &middot; by Category </div>

<div class="home-sections">

    <section aria-label="Posts about command-line">
        <header class="cli">
            <h2>$_ Command-line</h2>
        </header>
        <div class="content">
            <p>A series of articles on using Linux, Vim, and life on the command-line.
            Here are some highlights: </p>
            <ul>
                <li> Ubuntu for Mac Converts </li>
                <li> Command-line Basics </li>
                <li> Working with Vim </li>
                <li> Unix is my IDE </li>
            </ul>
        </main>
    </section>


    <section aria-label="Posts about WordPress">
        <header class="wp">
            <h2>WordPress</h2>
        </header>
        <div class="content">
            <p>I'm a software engineer at <a href="https://automattic.com/" rel="company">Automattic</a>, working on special projects
               including the WordPress block editor.</p>
            <ul>
                <li> Code Syntax Highlighting </li>
                <li> Creating a Gutenberg Block </li>
                <li> Gutenberg can do that! </li>
            </ul>
        </div>
    </section>

    <section aria-label="Posts about Data Viz">
        <header class="dataviz">
            <h2>Data Visualization</h2>
        </header>
        <div class="content">
            <p>I have a dream of being a sports dataviz artist, though
                I prefer it as a dream, so only dable here and there.
            </p>
            <ul>
                <li><a href="http://wideright.blog/2017/06/21/nba-draft-positions.html">NBA Draft Positions</a> (2017)</li>
                <li><a href="http://wideright.blog/2016/12/16/homerun-record.html">Homerun Record: What might of been</a></li>
                <li><a href="https://mkaz.blog/dataviz/xkcd-graph-style-in-d3/">xkcd graph style in d3</a></li>
            </ul>
        </div>
    </section>

    <section aria-label="Posts about Python">
        <header class="python">
            <h2>Python & Go </h2>
        </header>
        <div class="content">
            <p>Python and Go are my two favorite programming languages, probably because
I don't have to use them daily. <i>Familiarity breeds contempt.</i> Here are a few bits.
            </p>
            <ul>
                <li><a href="https://mkaz.blog/code/python-string-format-cookbook/"></a>Python String Format Cookbook</li>
                <li><a href="https://github.com/mkaz/termgraph"></a>Python Termgraph </li>
                <li><a href="https://github.com/mkaz/working-with-go">Working with Go</a></li>
            </ul>
        </div>
    </section>
</div>

    <?php dynamic_sidebar( 'author-1' ); ?>

</section>

<?php get_footer(); ?>
