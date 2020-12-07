<?php get_header(); ?>
<div class="l-wrapper l-wrapper--contact">
  <main class="l-main--individual-page">
    <div class="p-contact c-box--shadow">
      <h2 class="c-heading--border-bottom">お問い合わせ</h2>
      <div class="p-contact__wrap">
        <p class="p-contact__text">
          下記のお問い合わせについては、平日9時～17時にご確認しております。<br />
          ※ただし、祝祭日、年末年始（12/30～1/3）は除きます。<br />
          返信については、2～10営業日いただきますが、10営業日以上過ぎても連絡がない場合、<br />
          またはお急ぎの場合はお電話にてお問い合わせください。
        </p>
        <p class="p-contact__tel">
          TEL：0852-31-3360<br />
          <span>受付時間. 平日9時～17時</span>
        </p>
        <div>
          <?php echo do_shortcode( '[contact-form-7 id="553" title="お問い合わせ"]' ); ?>
        </div>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>