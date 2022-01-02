<?php


namespace App\WidgetsBuilder\Widgets;


use App\Events;
use App\Language;
use App\Widgets;
use App\WidgetsBuilder\WidgetBase;

class NewsletterWidget extends WidgetBase
{

    public function admin_render()
    {
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $widget_title = $widget_saved_values['widget_title'] ?? '';
        $widget_description = $widget_saved_values['description'] ?? '';

        $output .= '<div class="form-group"><input type="text" name="widget_title" class="form-control" placeholder="' . __('Newsletter Title') . '" value="' . $widget_title . '"></div>';
        $output .= '<div class="form-group"><input type="text" name="description" class="form-control" placeholder="' . __('Newsletter Description') . '" value="' . $widget_description . '"></div>';


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }


    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();
        $widget_title = $widget_saved_values['widget_title'] ??  '';
        $description = $widget_saved_values['description'] ??  '';

        $output = '<div class="col-lg-3 col-md-6"><div class="footer-widget widget newsletter-widget">';
        if (!empty($widget_title)){
            $output .= '<h4 class="widget-title">'.purify_html($widget_title).'</h4>';
        }
        $output .= '<p>'.$description.'</p>';
        $output .= '<div class="form-message-show"></div><div class="newsletter-form-wrap">';

        $output .= '<form action="'.route('frontend.subscribe.newsletter').'" method="post" enctype="multipart/form-data">';

        $output .= '<input type="hidden" name="_token" value="'.csrf_token().'">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="'.__('your email').'" class="form-control">
                    </div>
                    <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i></button>
                </form>';

        $output .= '</div></div></div>';

        return $output;

    }

    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __("Newsletter");
    }
}