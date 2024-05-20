<?php

namespace SiteSEO\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use SiteSEO\Constants\Options;

class AdvancedOption {
	
	/**
	 * @since 4.6.0
	 *
	 * @return array
	 */
	public function getOption(){
		return get_option(Options::KEY_OPTION_ADVANCED);
	}

	/**
	 * @since 4.6.0
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function searchOptionByKey($key){
		$data = $this->getOption();

		if (empty($data)) {
			return null;
		}

		if (! isset($data[$key])) {
			return null;
		}

		return $data[$key];
	}

	/**
	 * @since 5.0.0
	 *
	 * @return string
	 */
	public function getAccessUniversalMetaboxGutenberg(){
		return $this->searchOptionByKey('appearance_universal_metabox');
	}

	/**
	 * @since 6.0.0
	 *
	 * @return string
	 */
	public function getAppearanceNotification(){
		return $this->searchOptionByKey('appearance_notifications');
	}

	/**
	 * @since 5.0.0
	 *
	 * @return string
	 */
	public function getDisableUniversalMetaboxGutenberg(){
		$data = $this->getOption();

		if(!isset($data['appearance_universal_metabox_disable'])){
			return false;
		}
		
		return $data['appearance_universal_metabox_disable'] === '1';
	}

	/**
	 * @since 5.0.3
	 */
	public function getSecurityMetaboxRole(){
		return $this->searchOptionByKey('security_metaboxe_role');
	}

	/**
	 * @since 5.0.3
	 */
	public function getSecurityMetaboxRoleContentAnalysis(){
		return $this->searchOptionByKey('security_metaboxe_ca_role');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedAttachments(){
		return $this->searchOptionByKey('advanced_attachments');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedAttachmentsFile(){
		return $this->searchOptionByKey('advanced_attachments_file');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedReplytocom(){
		return $this->searchOptionByKey('advanced_replytocom');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedNoReferrer(){
		return $this->searchOptionByKey('advanced_noreferrer');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedWPGenerator(){
		return $this->searchOptionByKey('advanced_wp_generator');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedHentry(){
		return $this->searchOptionByKey('advanced_hentry');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedWPShortlink(){
		return $this->searchOptionByKey('advanced_wp_shortlink');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAdvancedWPManifest(){
		return $this->searchOptionByKey('advanced_wp_wlw');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAdvancedWPRSD(){
		return $this->searchOptionByKey('advanced_wp_rsd');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAdvancedGoogleVerification(){
		return $this->searchOptionByKey('advanced_google');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAdvancedBingVerification(){
		return $this->searchOptionByKey('advanced_bing');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAdvancedPinterestVerification(){
		return $this->searchOptionByKey('advanced_pinterest');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAdvancedYandexVerification(){
		return $this->searchOptionByKey('advanced_yandex');
	}
	/**
	 * @since 5.4.0
	 */
	public function getImageAutoTitleEditor(){
		return $this->searchOptionByKey('advanced_image_auto_title_editor');
	}
	/**
	 * @since 5.4.0
	 */
	public function getImageAutoAltEditor(){
		return $this->searchOptionByKey('advanced_image_auto_alt_editor');
	}
	/**
	 * @since 5.4.0
	 */
	public function getImageAutoCaptionEditor(){
		return $this->searchOptionByKey('advanced_image_auto_caption_editor');
	}
	/**
	 * @since 5.4.0
	 */
	public function getImageAutoDescriptionEditor(){
		return $this->searchOptionByKey('advanced_image_auto_desc_editor');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceMetaboxePosition(){
		return $this->searchOptionByKey('appearance_metaboxe_position');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceTitleCol(){
		return $this->searchOptionByKey('appearance_title_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceMetaDescriptionCol(){
		return $this->searchOptionByKey('appearance_meta_desc_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceRedirectUrlCol(){
		return $this->searchOptionByKey('appearance_redirect_url_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceRedirectEnableCol(){
		return $this->searchOptionByKey('appearance_redirect_enable_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceCanonical(){
		return $this->searchOptionByKey('appearance_canonical');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceTargetKwCol(){
		return $this->searchOptionByKey('appearance_target_kw_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceNoIndexCol(){
		return $this->searchOptionByKey('appearance_noindex_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceNoFollowCol(){
		return $this->searchOptionByKey('appearance_nofollow_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceWordsCol(){
		return $this->searchOptionByKey('appearance_words_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearancePsCol(){
		return $this->searchOptionByKey('advanced_appearance_ps_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceScoreCol(){
		return $this->searchOptionByKey('appearance_score_col');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceCaMetaboxe(){
		return $this->searchOptionByKey('appearance_ca_metaboxe');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceGenesisSeoMetaboxe(){
		return $this->searchOptionByKey('appearance_genesis_seo_metaboxe');
	}
	/**
	 * @since 5.4.0
	 */
	public function getAppearanceGenesisSeoMenu(){
		return $this->searchOptionByKey('appearance_genesis_seo_menu');
	}

	/**
	 * @since 5.4.0
	 */
	public function getAppearanceSearchConsole(){
		return $this->searchOptionByKey('advanced_appearance_search_console');
	}

	/**
	 * @since 5.8
	 */
	public function getAdvancedCleaningFileName(){
		return $this->searchOptionByKey('advanced_clean_filename');
	}
	/**
	 * @since 5.8
	 */
	public function getAdvancedImageAutoAltTargetKw(){
		return $this->searchOptionByKey('advanced_image_auto_alt_target_kw');
	}

	/**
	 * @since 5.8
	 */
	public function getSecurityGaWidgetRole(){
		return $this->searchOptionByKey('advanced_security_ga_widget_role');
	}

	/**
	 * @since 6.1
	 */
	public function getSecurityMatomoWidgetRole(){
		return $this->searchOptionByKey('advanced_security_matomo_widget_role');
	}
	
	    /**
     * @since 6.6.0
     *
     * @return string
     */
    public function getBreadcrumbsEnable() {
        return $this->searchOptionByKey('breadcrumbs_enable');
    }

    /**
     * @since 6.6.0
     *
     * @return string
     */
    public function getBreadcrumbsJsonEnable() {
        return $this->searchOptionByKey('breadcrumbs_json_enable');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsSeparator() {
        return $this->searchOptionByKey('breadcrumbs_separator');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nHere() {
        return $this->searchOptionByKey('breadcrumbs_i18n_here');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nHome() {
        return $this->searchOptionByKey('breadcrumbs_i18n_home');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nAuthor() {
        return $this->searchOptionByKey('breadcrumbs_i18n_author');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18n404() {
        return $this->searchOptionByKey('breadcrumbs_i18n_404');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nSearch() {
        return $this->searchOptionByKey('breadcrumbs_i18n_search');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nNoResults() {
        return $this->searchOptionByKey('breadcrumbs_i18n_no_results');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nAttachments() {
        return $this->searchOptionByKey('breadcrumbs_i18n_attachments');
    }

    /**
     * @since 6.0.0
     *
     * @return string
     */
    public function getBreadcrumbsI18nPaged() {
        return $this->searchOptionByKey('breadcrumbs_i18n_paged');
    }

    /**
     * @since 6.0.0
     *
     * @return boolean
     */
    public function getBreadcrumbsRemoveBlogPage() {
        return $this->searchOptionByKey('breadcrumbs_remove_blog_page');
    }

    /**
     * @since 6.0.0
     *
     * @return boolean
     */
    public function getBreadcrumbsRemoveShopPage() {
        return $this->searchOptionByKey('breadcrumbs_remove_shop_page');
    }

    /**
     * @since 6.0.0
     *
     * @return boolean
     */
    public function getBreadcrumbsDisableSeparator() {
        return $this->searchOptionByKey('breadcrumbs_separator_disable');
    }

    /**
     * @since 6.0.0
     *
     * @return boolean
     */
    public function getBreadcrumbsStorefront() {
        return $this->searchOptionByKey('breadcrumbs_storefront');
    }
}
