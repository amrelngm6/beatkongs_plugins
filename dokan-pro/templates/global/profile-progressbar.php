<?php
/**
 *  Profile Progressbar template
 *
 *  @since 2.4
 *
 *  @package dokan
 */
?>
<div class="dokan-panel dokan-panel-default dokan-profile-completeness">
    <div class="dokan-panel-body">
        <div class="dokan-progress">
            <div class="dokan-progress-bar dokan-progress-bar-info dokan-progress-bar-striped" role="progressbar"
                aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress ?>%">
                <?php echo $progress . __( '% Profile complete', 'dokan' ) ?>
            </div>
        </div>
        <div class="dokan-alert dokan-alert-info dokan-panel-alert">
            <?php echo esc_html( dokan_progressbar_translated_string( $next_todo, $value, $progress ) ); ?>
            <?php if ( $progress >= 100 ) : ?>
            <sapn class="fa fa-times dokan-right" id="dokan-profile-progressbar-closer"
                data-nonce="<?php echo wp_create_nonce( 'dokan_user_closed_progressbar' ); ?>"></sapn>
            <?php endif; ?>
        </div>
    </div>
</div>


<div style="padding-bottom: 30px">
    <div id="profile-completeness" class="flex-grow-1 mt-3 md:mt-0">
        <div class="pb-35px rounded-md border border-gray-default mt-0px pt-35px bg-blue-dodger">
            <div class="px-25px"></div>
            <div class="px-25px">
                <div class="grid lg:grid-cols-5 md:grid-flow-row md:row-gap-3 lg:grid-flow-col min-w-full">
                    <div class="flex lg:col-span-3">
                        <div class="h-12 w-12 rounded-full shadow-sm bg-white"><img
                                class="h-full w-full object-cover p-1 rounded-full"
                                src="https://secure.gravatar.com/avatar/1caa217160c95b55ae8e431e7d4851a0?s=96&amp;d=mm&amp;r=g"
                                alt="Your avatar"></div>
                        <div>
                            <div class="ml-2 text-white">
                                <?php $user = wp_get_current_user(); ?>
                                <div class="text-dokan-sm-title">Welcome back,</div>
                                <div class="text-dokan-lg-title font-extrabold"><?php echo $user->display_name; ?> !</div>
                                <div class="md:w-auto w-48 mt-3">
                                    <div
                                        class="ant-progress ant-progress-line ant-progress-status-active ant-progress-small">
                                        <div class="ant-progress-outer">
                                            <div class="ant-progress-inner">
                                                <div class="ant-progress-bg"
                                                    style="width: <?php echo $progress . __( '%', 'dokan' ) ?>; height: 6px; background: rgb(0, 200, 84);"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-hairline">
                                        <p class="mt-1">Your profile is&nbsp;<span
                                                class="font-extrabold"><?php echo $progress . __( '% Profile complete', 'dokan' ) ?>&nbsp;</span></p>
                                            <?php echo esc_html( dokan_progressbar_translated_string( $next_todo, $value, $progress ) ); ?>
                                            <?php if ( $progress >= 100 ) : ?>
                                                <p class="mt-2"><b>Next Goal:</b>&nbsp;<?php echo wp_create_nonce( 'dokan_user_closed_progressbar' ); ?></p>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-2">
                        <div class="flex-1 m-2 md:m-0 h-full pt-3 pb-2 lg:p-4 rounded-md bg-white">
                            <div
                                class="grid grid-rows-1 justify-center justify-items-center md:grid-cols-2 mt-2 lg:mt-5 lg:mb-3 w-full">
                                <div class="justify-items-center md:justify-self-start lg:pl-2">
                                    <div class="text-dokan-lg-title text-center md:text-left font-extrabold ">30%</div>
                                    <div class="py-2 text-secondary">Profile completion</div>
                                </div>
                                <div class="justify-items-center md:justify-self-end"><button type="button"
                                        class="transition bg-green-500 text-white rounded-md px-3 py-2 m-3">Complete
                                        Your Profile</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>