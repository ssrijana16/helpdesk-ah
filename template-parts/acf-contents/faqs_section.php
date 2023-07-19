<?php

if(get_row_layout() == 'faqs_section'):

	$faqs = get_sub_field('faqs');

	if($faqs):

    ?>

    <div class="faq blog-faq">

      <script type="application/ld+json">

        {

          "@context": "https://schema.org",

          "@type": "FAQPage", 

          "mainEntity": [ <?php

             foreach($faqs as $faq):  ?>

              {

                "@type": "Question",

                "name": "<?php echo $faq['faqs_questions']; ?>",

                "acceptedAnswer": {

                  "@type": "Answer",

                  "text": "<?php echo $faq['faqs_answers']; ?>"

                }

              },<?php

            endforeach; ?> 

          ]

        }

      </script>

      <div class="common-head">

        <h2>Frequently asked questions</h2>

      </div><!-- common-head -->

      <ul class="accordion-list"><?php

        foreach($faqs as $faq){ ?>

          <li>

            <h3><?php echo $faq['faqs_questions']; ?></h3>

            <div class="answer">

              <?php echo $faq['faqs_answers']; ?>

            </div>

          </li><?php

        } ?>

      </ul>

   

    </div><!-- Closing container div for front page -->

     <?php

  

  endif; 

endif;  ?>



