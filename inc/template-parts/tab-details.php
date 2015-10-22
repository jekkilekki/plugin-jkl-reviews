<?php

/**
 * Provides the "Details" view for the corresponding tab in the Post Meta Box.
 * 
 * @since       2.0.1
 * 
 * @package     JKL_Reviews
 * @subpackage  JKL_Reviews/inc/template-parts
 * @author      Aaron Snowberger <jekkilekki@gmail.com>
 */

?>

<div class="jkl-review-meta tab-details hidden">

    <?php
    /**
     * Dynamically loop through our Review Types (array) and create each info box fields
     */
    foreach( $review_info as $review_type => $data ) {
        
        echo "<div id='$review_type-details' class='jkl-review $review_type-info hidden'>";
        
            /**
             * Call function to load each Review Type's labels in meta boxes
             */
            jkl_reviews_load_detail_part( $review_type, $data );
            
        echo "</div><!-- #$review_type-details -->";
    }
    ?>
    
</div><!-- #jkl-review-meta -->

<?php
/**
 * Accepts the Review Type 'slug' and an array of its data, then outputs the HTML 
 * for that Review Type's details meta box
 * 
 * @since   2.0.1
 * 
 * @param   string  $str_type
 * @param   array   $array
 */
function jkl_reviews_load_detail_part( $str_type, $array ) {
    ?>

        <!-- Label option - to display near title - gives details about the product -->
        <div class="jkl-labeler group">
            
            <!--<h4>Label</h4>-->
            <input type='checkbox' id='jkl-review-labeled' name='jkl-review-labeled' value='1' <?php //checked( $options['use_shortcode'], 1 ); ?> />
            <label for="jkl-review-labeled" name="jkl-review-labeled"><?php echo $array['labeled']; ?></label>
            <input type="text" class="" id="jkl-review-details-label" name="jkl-review-details-label" 
                   value="<?php echo ( isset( $jklrv_stored_meta['jkl-review-details-label'] ) ? esc_attr( $jklrv_stored_meta['jkl-review-details-label'][0] ) : $array['label'] ); ?>" />
            
            <span class="jkl-label-preview-container">Preview: 
                <span class="jkl-label-preview"><?php echo $array['label']; ?></span>
            </span>
            
        </div>  
        
        <div class="divider"></div>
        
        <!--<p><input type="button" id="jkl-reviews-add-details" class="button" value="Add details" /></p>-->
        
        <!-- Details -->
        <div id="jkl-review-details" class="group">
            
            <!--<h4>Details</h4>-->
            
            <p class="note"><?php _e( 'The following section allows you to add 1-2 lists of details'
                    . ' about the product. The lists will be shown side-by-side in the review and '
                    . ' you determine the list width and type of list at the bottom of the section.', 'jkl-reviews' ); ?>
            </p>
            
            <div class="jkl-review-details group">
                <form>
                    <fieldset class="jkl-review-details-left">
                        <legend><?php _e( 'List 1:', 'jkl-reviews' ); ?></legend>
                        
                        <label for="jkl-detail-list-1-display-type" class="jkl-label"><?php _e( 'Type:', 'jkl-reviews' ); ?></label>
                        <select id="jkl-detail-list-1-display-type" name="jkl-reviews-detail-list-1-display-type">
                            <option value="numbered">1. Numbered list</option>
                            <option value="bullet">&bull; Bullet list</option>
                            <option value="csv">, Comma Separated Values</option>
                            <option value="none">No style</option>
                            <option value="delete">Don't display</option>
                        </select>
                        <br>
                        <label for="jkl-review-detail-label-1" class="jkl-label"><?php _e( 'Label:', 'jkl-reviews' ); ?></label>
                        <input type="text" class="jkl-review-detail-label" id="jkl-review-detail-label-1" name="jkl-review-detail-label-1" placeholder="List 1 heading"
                               value="<?php echo ( isset( $jklrv_stored_meta['jkl-review-detail-label-1'] ) ? esc_attr( $jklrv_stored_meta['jkl-review-detail-label-1'][0] ) : $array['details-1-label'] ); ?>" />

                        <div class="jkl-review-detail-info">
                            <ol>
                                <li class="sortable">
                                    <input type='text' name='jkl-detail-list-1-item-1' id='jkl-detail-list-1-item-1' class='jkl-review-detail' placeholder='Detail' value='' />
                                </li>
                            </ol>
                            
                            <input type="button" class="jkl-reviews-add-item button" value="Add Detail" />
                        </div>
                        
                    </fieldset>
                    
                    <fieldset class="jkl-review-details-right">
                        <legend>List 2:</legend>
                        
                        <label for="jkl-detail-list-2-display-type" class="jkl-label"><?php _e( 'Type:', 'jkl-reviews' ); ?></label>
                        <select id="jkl-detail-list-2-display-type" name="jkl-reviews-detail-list-2-display-type">
                            <option value="numbered">1. Numbered list</option>
                            <option value="bullet">&bull; Bullet list</option>
                            <option value="csv">, Comma Separated Values</option>
                            <option value="none">No style</option>
                            <option value="delete">Don't display</option>
                        </select>
                        <br>
                        <label for="jkl-review-detail-label-2" class="jkl-label"><?php _e( 'Label:', 'jkl-reviews' ); ?></label>
                        <input type="text" class="jkl-review-detail-label" id="jkl-review-detail-label-2" name="jkl-review-detail-label-2" placeholder="List 2 heading"
                               value="<?php echo ( isset( $jklrv_stored_meta['jkl-review-detail-label-2'] ) ? esc_attr( $jklrv_stored_meta['jkl-review-detail-label-2'][0] ) : $array['details-2-label'] ); ?>" />

                        <div class="jkl-review-detail-info">
                            <ol>
                                <li class="sortable">
                                    <input type='text' name='jkl-detail-list-2-item-1' id='jkl-detail-list-2-item-1' class='jkl-review-detail' placeholder='Detail' value='' />
                                </li>
                            </ol>
                            
                            <input type="button" class="jkl-reviews-add-item button" value="Add Detail" />
                        </div>

                    </fieldset>
                    
                    <input type="button" class="jkl-reviews-add-row button" value="Add Detail Row" />
                </form>
            </div>
            
            <label for="jkl-detail-list-sizing" class="jkl-label"><?php _e( 'Set list widths:', 'jkl-reviews' ); ?></label>
            <br>
            <span class="range-number-left">0</span> 
                <input type="range" min="0" max="100" step="10" list="list-width" onchange="showValue(this.value)" 
                           id="jkl-detail-list-sizing" name="jkl-detail-list-sizing" 
                           value="<?php echo isset( $jklrv_stored_meta['jkl_review_rating'] ) ? $jklrv_stored_meta['jkl_review_rating'][0] : 0; ?>" />
                <datalist id="list-width">
                    <option>0</option>
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>50</option>
                    <option>60</option>
                    <option>70</option>
                    <option>80</option>
                    <option>90</option>
                    <option>100</option>
                </datalist>
                <span class="range-number-right">100</span>
                
                <output for="jkl-detail-list-sizing" id="jkl-review-detail-list-sizing">
                    <?php echo isset( $jklrv_stored_meta['jkl_review_rating'] ) ? $jklrv_stored_meta['jkl_review_rating'][0] : 0; ?>
                </output>
                <span id="star-rating-text"><?php _e( 'Stars', 'jkl-reviews/languages' ) ?></span>
                
                <!-- Simple function to dynamically update the output value of the range slider after user releases the mouse button -->
                <script>
                function showValue(rating) {
                    document.querySelector('#jkl-detail-list-sizing').value = rating;
                }
                </script>
            
        </div><!-- #jkl-review-details --> 
        
        <div class="divider"></div>
        
        <!--<h4>Links</h4>-->
        <p class="note"><?php _e( sprintf( 'Add %s link URLs below.', ucwords( $str_type ) ), 'jkl-reviews' ); ?></p>
        <div id="jkl-reviews-link-header" class="hidden">
            <label class="jkl-reviews-link-icon"><?php _e( 'Icon Code', 'jkl-reviews' ); ?></label>
            <label class="jkl-reviews-link-label"><?php _e( 'Link Title', 'jkl-reviews' ); ?></label>
            <label class="jkl-reviews-link-url"><?php _e( 'Link URL', 'jkl-reviews' ); ?></label>
        </div>

        <div id="jkl-reviews-links"></div><!-- #jkl-reviews-links -->

        <p>
            <input type="submit" id="jkl-reviews-add-link" class="button" value="+" />
            <input type="submit" id="jkl-reviews-remove-link" class="button hidden" value="-" />
        </p>

<?php
}