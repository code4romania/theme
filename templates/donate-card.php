<?php
  // TODO: Figure out text translations options
  // TODO: Newsletter subscribe integration
  // TODO: Add nonce
?>
<div class="small-12 medium-offset-1 medium-10 large-offset-0 large-8">
  <div class="donate-hero">
    <h1><?php echo the_title(); ?></h1>
    <p class="donate-copy">
      <?php the_field('doneaza_intro'); ?>
    </p>
    <form action="" method="post" class="donate-form">
      <div class="donate-step">
        <div class="media-object">
          <div class="media-object-section">
            <span class="donate-count">1</span>
          </div>
          <div class="media-object-section">
            <div class="donate-label js-label-donate"><?php the_field('doneaza_step_1'); ?></div>
            <div class="donate-options row">
              <?php
                $donations_config = apply_filters('donations_gateway_get_config');

                foreach ($donations_config['amounts'] as $i => $amount) {
                  printf(
                    '<div class="donate-option small-4 medium-3 columns">'.
                    '<input type="radio" name="donate[value]" value="%2$d" id="donate-value-%2$d" class="donate-value"%3$s>'.
                    '<label for="donate-value-%2$d">%2$d %1$s</label></div>',
                    $donations_config['currency']['name'], $amount, checked($i, 1, false)
                  );
                }
              ?>
              <div class="donate-option small-4 small-offset-4 medium-3 columns">
                <input type="radio" name="donate[value]" value="" id="donate-value-custom" class="donate-value">
                <label class="donate-input-custom">
                  <input type="number" class="js-donate-value-custom" step="1" min="15" name="donate[value]" id="donate-value-custom" placeholder=" ">
                  <span class="donate-label-after"><?php echo $donations_config['currency']['name']; ?></span>
                </label>
              </div>
              <div class="donate-recurrent small-12 columns">
                <input name="donate[recurrent]" value="0" type="hidden">
                <input name="donate[recurrent]" value="1" type="checkbox" id="donate-monthly-recurrence" >
                <label for="donate-monthly-recurrence"><?php the_field('doneaza_recurrent'); ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="donate-step">
        <div class="media-object">
          <div class="media-object-section">
            <span class="donate-count">2</span>
          </div>
          <div class="media-object-section">
            <div>
              <div class="row">
                <div class="small-12 medium-7 columns">
                  <div class="donate-person">
                  </div>
              <div class="donate-label js-label-donate"><?php the_field('doneaza_step_2'); ?></div>
                    <input type="text" name="donate[name]" placeholder="<?php the_field('doneaza_label_nume'); ?>" required>
                </div>
                <div class="small-12 medium-7 columns">
                  <div class="donate-person">
                  </div>
                </div>
                <div class="small-12 medium-5 columns">
                  <input name="donate[currency]" type="hidden" value="<?php echo $donations_config['currency']['code']; ?>">
                  <input type="submit" class="button donate-button" value="Donează">
                    <input type="email" name="donate[email]" placeholder="<?php the_field('doneaza_label_e-mail'); ?>" required>
                </div>
              </div>
              <p class="donate-secure">
                <i class="fa fa-lock"></i>
            </div>
              <?php the_field('doneaza_security'); ?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>