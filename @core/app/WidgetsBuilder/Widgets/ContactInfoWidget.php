<?php

namespace App\WidgetsBuilder\Widgets;
use App\Language;
use App\WidgetsBuilder\WidgetBase;

class ContactInfoWidget extends WidgetBase
{

    public function admin_render()
    {
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

            $widget_title = $widget_saved_values['widget_title'] ?? '';
            $location =  $widget_saved_values['location'] ?? '';
            $phone =  $widget_saved_values['phone'] ?? '';
            $email =  $widget_saved_values['email'] ?? '';

            $output .= '<div class="form-group"><input type="text" name="widget_title"  class="form-control" placeholder="' . __('Widget Title') . '" value="'. $widget_title .'"></div>';
            $output .= '<div class="form-group"><input type="text" name="location" class="form-control" placeholder="' . __('Location') . '" value="'. $location .'"></div>';
            $output .= '<div class="form-group"><input type="text" name="phone"  class="form-control" placeholder="' . __('Phone') . '" value="'. $phone .'"></div>';
            $output .= '<div class="form-group"><input type="email" name="email" class="form-control" placeholder="' . __('Email') . '" value="'. $email .'"></div>';


        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();
        $widget_title =  $widget_saved_values['widget_title'] ?? '';
        $location =  $widget_saved_values['location'] ?? '';
        $phone =  $widget_saved_values['phone'] ?? '';
        $email = $widget_saved_values['email'] ?? '';


        $output = $this->widget_before(); //render widget before content

        if (!empty($widget_title)){
            $output .= '<h4 class="widget-title">'.purify_html($widget_title).'</h4>';
        }
        $output .= '<ul class="contact_info_list">';
        if(!empty($location)){
            $output .= ' <li class="single-info-item">
                    <div class="icon">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="details">
                        '.purify_html($location).'
                    </div>
                </li>';
        }
        if(!empty($phone)){
            $output .= '<li class="single-info-item">
                    <div class="icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="details">
                       '.purify_html($phone).'
                    </div>
                </li>';
        }
        if(!empty($email)){
            $output .= '<li class="single-info-item">
                    <div class="icon">
                        <i class="fas fa-envelope-open"></i>
                    </div>
                    <div class="details">
                       '.purify_html($email).'
                    </div>
                </li>';
        }
        $output .= '</ul>';

        $output .= $this->widget_after(); // render widget after content

        return $output;
    }

    public function widget_title()
    {
        return __('Contact Info');
    }

}