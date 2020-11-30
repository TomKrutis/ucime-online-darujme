<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://efox.cloud
 * @since      1.0.0
 *
 * @package    Ucime_Online_Darujme
 * @subpackage Ucime_Online_Darujme/public/partials
 */
?>

<div class="uod-main-container">

    <!--<div class="uod-itself-or-company-box">
        <span class="uod-label">Přispívám: </span>

        <button type="button" id="uod-itself-button" class="uod-itself-button">ZA SEBE</button>
        <button type="button" id="uod-company-button" class="uod-company-button">ZA FIRMU</button>

    </div>-->

    <div class="container-fluid uod-gifts-container">
        <div class="row">

            <?php
foreach ($gifts as $index => $data) {
    ?>
            <div class="col-sm-4">
                <div class="<?php echo $data->highlight ? 'uod-rectangle-highlight' : 'uod-rectangle'; ?>">
                    <div class="uod-amount">
                        <span class="uod-amount-value"><?php echo number_format($data->amount_for_itself, 0, ',', ' '); ?></span> 
                        Kč
                    </div>
                    <input type="hidden" class="uod_amount_itself" value="<?php echo $data->amount_for_itself ?>">
                    <input type="hidden" class="uod_amount_company" value="<?php echo $data->amount_for_company ?>">

                    <div class="uod-gift-items">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> klávesnice <br />

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> myš <br />

                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg> sluchátka <br />

                        <?php if ($data->id == 1) { ?>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>

                        <?php } else { ?>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg>
                        <?php } ?>
                        webkamera <br />

                        <?php if ($data->id == 1 || $data->id == 2) { ?>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>

                        <?php } else { ?>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                        </svg>
                        <?php } ?>
                        počítač s monitorem

                    </div>


                    <div class="uod-counter-box">
                        <button class="uod-minus">-</button> 
                        <span class="uod-counter"><?php echo $data->default_counter ?></span> 
                        <button class="uod-plus">+</button>
                    </div>

                </div>
            </div>
            <?php
}
?>

        </div>
    </div>

    <div class="uod-total-amount-box">
        <span class="uod-total-amount-label">Celkem přispívám: </span>
        <span id="uod-total-amount" class="uod-total-amount">1 800</span> <span class="uod-total-amount">Kč</span>
    </div>

    <div class="uod-want-to-contribute-box">
        <a id="uod-contribute-link" href="https://www.darujme.cz/darovat/1203574?amount=1800" target="_blank">CHCI PŘISPĚT</a>
    </div>

</div>