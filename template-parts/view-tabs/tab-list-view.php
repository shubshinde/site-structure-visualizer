<div class="tab-content">

    <div class="">
        <?php
        if (count(SSVP_SITE_DATA["post_types"])) {
        ?>
            <big><b>Post Types</b></big>
            <div>
                <ol>
                    <?php
                    foreach (SSVP_SITE_DATA["post_types"] as $index => $data) {
                    ?>
                        <li class="shadow p-3 mt-3">

                            <p><span class="text-muted">Post Name : </span><b><?php echo esc_attr($data['post_name']); ?></b></p>
                            <p><span class="text-muted">Post Slug : </span><b><?php echo esc_attr($data['post_slug']); ?></b></p>

                            <div class="">
                                <?php
                                if (count($data["post_taxonomies"])) {
                                ?>
                                    <b class="text-muted"> Taxonomies : </b>
                                    <div>
                                        <ol>
                                            <?php
                                            foreach ($data["post_taxonomies"] as $index => $taxonomy) {
                                            ?>
                                                <li class="shadow p-3 mt-3">
                                                    <b><?php echo esc_attr($taxonomy['tax_name']); ?></b> <small class="text-muted">(<?php echo esc_attr($taxonomy['tax_slug']); ?>)</small>
                                                    <div class="bg-light mt-3 p-2">
                                                        <div class="">
                                                            <?php
                                                            if (count($taxonomy["tax_terms"])) {
                                                            ?>
                                                                <b class="text-muted" style="margin-left:30px;"> Terms : </b>
                                                                <div class="mt-3">
                                                                    <ol>
                                                                        <?php
                                                                        foreach ($taxonomy["tax_terms"] as $index => $term) {
                                                                        ?>
                                                                            <li class=" ">
                                                                                <b><?php echo esc_attr($term['term_name']); ?></b> <small class="text-muted">(<?php echo esc_attr($term['term_slug']); ?>)</small>
                                                                            </li>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </ol>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ol>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ol>
            </div>
        <?php
        }
        ?>
    </div>

</div>