<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class HomeDataAndSeo extends Model
{
    use Translatable;
    protected $translatable = ['seo_title', 'seo_description', 'seo_keywords', 'slider_button', 'about_section_start_text', 'about_section_title', 'about_section_description', 'service_title_1', 'service_content_1', 'service_title_2', 'service_content_2', 'services_title', 'service_title_3', 'service_title_4', 'service_content_3', 'service_content_4', 'footer_description', 'contact_details_title', 'contact_first_text', 'email_text', 'opening_hour_title', 'opening_hour_text', 'footer_form_title', 'footer_email_placeholder', 'footer_send_button', 'copyright_text'];   
}
