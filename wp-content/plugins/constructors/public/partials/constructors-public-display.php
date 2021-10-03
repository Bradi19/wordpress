<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://razrabotkasajta.biz
 * @since      1.0.0
 *
 * @package    Constructors
 * @subpackage Constructors/public/partials
 */
?>
<div class="container-fluid">
    <div class="blockLi">
        <div class="my_col">
            <div class="shop">Shop</div>
        </div>
        <div class="my_col">
            <div class="add_photo">Add photo</div>
        </div>
        <div class="my_col">
            <div class="AddText">Add text</div>
        </div>
    </div>
    <div class="blockTi">
        <div class="my_col">
            <ul class='block'>
                <div>
                    <li class="category-name dropper">Pullover <span class="arrow">></span></li>
                    <ul class="cat-sub">
                        <li class="subcategory-name">follow
                            <input type="checkbox" class="subcategory" data-action="find-category" value="0" />
                        </li>
                    </ul>
                </div>
                <?php
                foreach ($category as $cat) {
                ?>
                    <div class="category-name">
                        <li><?= $cat['name'] ?></li>
                    </div>
                    <ul class="cat-sub">
                        <?php foreach ($cat['subcategory'] as $sub) {
                        ?>
                            <li class='subcategory-name'> <?= $sub['name'] ?>
                                <input type="checkbox" class="subcategory" data-action="find-category" value="<?= $sub->id ?>" />
                            </li>
                    </ul>

            <?php }
                    } ?>
            </ul>
        </div>
        <div class="my_col">
            <div class="filer">Upload Files</div>
            <label>
                <input id="upfile" class="upfile" type="file" name="uploadFile" value="" />
            </label>
        </div>
        <div class="my_col">
            <ul class="texter-input">
                <li><label><input placeholder="Text" type="text" name="adder_text" value="" /></li></label>
                <li><label><input placeholder="size" type="number" min="1" max="50" name="size_text" value="" /></li></label>
                <li><label><input placeholder="lenght" type="number" min="1" max="20" name="lenght_text" value="" /></li></label>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="place_block">
            <div class="image_shop">
                <img src="<?php echo plugin_dir_url(dirname(__FILE__)) .  'images/default.png' ?>" />
            </div>
            <div class="block_formater">
                <div class="formater">
                </div>
            </div>
            <div class="block_text">
                
            </div>
        </div>
    </div>
</div>