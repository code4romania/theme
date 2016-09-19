<?php while (have_posts()) : the_post(); ?>

<section class="block block-hero block-content block-project wrap container">
  <div class="hero">
    <div class="hero-content content row">
      <?php
        $thumb_url      = "";
        $defaultProjectPic   = esc_url(get_template_directory_uri()) . "/assets/images/default-project.png";
        $category = get_the_category()[0];
        $class = $category->slug . '-class';
        $titluCF = get_post_meta($post->ID, 'titlu',true);
        $organizatie = get_post_meta($post->ID, 'organizatie',true);
        $organizatieLogo = get_post_meta($post->ID, 'organizatie_logo',true);
        $organizatieDescriere = get_post_meta($post->ID, 'organizatie_descriere',true);
        $organizatieLink = get_post_meta($post->ID, 'organizatie_link',true);
        $github = get_post_meta($post->ID, 'github',true);
        $budget = get_post_meta($post->ID, 'buget',true);
        $actiunePrimaraTextCF = get_post_meta($post->ID, 'actiune_primara_text',true);
        $actiunePrimaraLinkCF = get_post_meta($post->ID, 'actiune_primara_link',true);
        $actiuneSecundaraTextCF = get_post_meta($post->ID, 'actiune_secundara_text',true);
        $actiuneSecundaraLinkCF = get_post_meta($post->ID, 'actiune_secundara_link',true);
        $substadii = get_post_meta($post->ID, 'substadii',true);
        $target_first = get_post_meta($post->ID, 'open_in_new_window_first',true);
        $target_second = get_post_meta($post->ID, 'open_in_new_window_first',true);

        $actiunePrimaraText   = $actiunePrimaraTextCF !== NULL ? $actiunePrimaraTextCF : "";
        $actiunePrimaraLink   = $actiunePrimaraLinkCF !== NULL ? $actiunePrimaraLinkCF : "";
        $actiuneSecundaraText = $actiuneSecundaraTextCF !== NULL ? $actiuneSecundaraTextCF : "";
        $actiuneSecundaraLink = $actiuneSecundaraLinkCF !== NULL ? $actiuneSecundaraLinkCF : "";
        // $substadiu    = $substadiuCF !== NULL ? $substadiuCF : "";

        if (has_post_thumbnail()) {
          $thumb_id  = get_post_thumbnail_id();
          $thumb_url = wp_get_attachment_image_src($thumb_id, "full")[0];
        } else {
          $thumb_url = $defaultProjectPic;
        }

        ?>

      <div class="small-12 large-offset-1 large-10 columns">
        <div class="hero-project media-object">
          <div class="media-object-section middle">
            <img src="<?php echo $thumb_url; ?>" alt="<?php the_title(); ?>">
            <?php if($github): ?>
              <a href="<?php echo $github; ?>" class="project-git mono" target="_blank">
                <i class="fa fa-github" aria-hidden="true"></i>
                <span>Vezi codul</span>
              </a>
            <?php endif; ?>
          </div>
          <div class="media-object-section">
            <h1><?php the_title(); ?></h1>
            <div class="project-desc">
              <?php the_content(); ?>
            </div>
            <div class="actions actions-project">
              <?php if(!empty($actiunePrimaraText)): ?>
                <a href="<?php echo $actiunePrimaraLink; ?>" target="<?php echo $target_first; ?>" class="button large underline inverted" target="_blank"><?php echo $actiunePrimaraText; ?></a>
              <?php endif ?>
              <?php if(!empty($actiuneSecundaraText)): ?>
                <a href="<?php echo $actiuneSecundaraLink; ?>" target="<?php echo $target_second; ?>" class="button large underline inverted"><?php echo $actiuneSecundaraText; ?></a>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="status <?php echo $class; ?>">
    <?php if($category->slug == 'proiect_cu_nevoie_de_voluntari'): ?>
      Acest proiect <span><?php echo $category->name; ?></span>.
    <?php else: ?>
      Acest proiect este <span><?php echo $category->name; ?></span>.
    <?php endif; ?>
  </div>
</section>

<section class="block block-content block-progress wrap container">
  <div class="content row">
    <div class="small-12 medium-offset-1 medium-10 columns">
      <div class="row">
        <div class="small-12 medium-6 columns">
          <div class="owner media-object">
            <div class="media-object-section middle">
              <?php if($organizatieLink): ?>
                <a href="<?php echo $organizatieLink; ?>" target="_blank">
                  <img src="<?php echo wp_get_attachment_url($organizatieLogo); ?>" alt="<?php echo $organizatie; ?>">
                </a>
              <?php else: ?>
                <img src="<?php echo wp_get_attachment_url($organizatieLogo); ?>" alt="<?php echo $organizatie; ?>">
              <?php endif; ?>
            </div>
            <div class="media-object-section middle">
              <h2>
                <span>O idee:</span>
                <?php echo $organizatie; ?>
              </h2>
              <?php if($budget): ?>
                <a href="<?php echo $budget; ?>" class="owner-budget" target="_blank">Vezi bugetul</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="small-12 medium-6 columns">
          <div class="meta-project">
            <ul class="social social-project">
              <li>
                <a href="#" class="social-icon social-facebook">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#" class="social-icon social-twitter">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#" class="social-icon social-google-plus">
                  <i class="fa fa-google-plus" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#" class="social-icon social-linkedin">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="ui-help">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
      </div>
      <div class="table-scroll">
        <table class="progress-wrap">
          <tr class="progress <?php echo $substadii; ?>">
            <td class="progress-step">
              <strong class="progress-no">1</strong>
              <span class="progress-state">Concept</span>
            </td>
            <td class="progress-step">
              <strong class="progress-no">2</strong>
              <span class="progress-state">Specificații UX</span>
            </td>
            <td class="progress-step">
              <strong class="progress-no">3</strong>
              <span class="progress-state">Arhitectură tehnică</span>
            </td>
            <td class="progress-step">
              <strong class="progress-no">4</strong>
              <span class="progress-state">Dezvoltare</span>
            </td>
            <td class="progress-step">
              <strong class="progress-no">5</strong>
              <span class="progress-state">Testare</span>
            </td>
            <td class="progress-step">
              <strong class="progress-no">6</strong>
              <span class="progress-state">Lansare</span>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>

<section class="block block-content block-details wrap container">
  <div class="hero-content content row">
    <div class="small-12 medium-offset-1 medium-10 columns">
      <h1>Echipa</h1>
      <div class="members row">
        <?php
          $membri         = get_field('membri_echipa', $post->ID);
          $columnsNumber  = ceil(count($membri) / 3) * 3;

          for($index = 0; $index < $columnsNumber; $index++) {
            if($index < count($membri)) {

              $membru = $membri[$index];
              $poza   = repeaterFieldValueOrDefault("poza", $membru);

              if($poza === null || $poza === "") {
                $poza = "http://www.fillmurray.com/400/400";
              }
        ?>
          <div class="small-6 large-4 columns">
            <div class="member member-small media-object">
              <div class="media-object-section">
                <img src="<?php echo $poza; ?>" alt="<?php echoRepeaterFieldValueOrDefault("nume", $membru); ?>">
              </div>
              <div class="media-object-section middle">
                <h3><?php echoRepeaterFieldValueOrDefault("nume", $membru); ?></h3>
              </div>
            </div>
          </div>
        <?php
            }

          }
        ?>
      </div>
    </div>
  </div>
</section>

<?php endwhile; ?>
