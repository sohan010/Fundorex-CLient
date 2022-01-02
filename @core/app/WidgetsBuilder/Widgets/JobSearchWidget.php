<?php


namespace App\WidgetsBuilder\Widgets;


use App\Language;
use App\WidgetsBuilder\WidgetBase;

class JobSearchWidget extends WidgetBase
{

    public function admin_render()
    {
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();

        $widget_title = $widget_saved_values['widget_title' ] ?? '';
        $output .= '<div class="form-group"><label>'.__('Widget Title').'</label><input type="text" name="widget_title" class="form-control" placeholder="' . __('Widget Title') . '" value="' . $widget_title . '"></div>';

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();
        $widget_title = $widget_saved_values['widget_title' ] ?? '';

        $output = $this->widget_before(); //render widget before content

        if (!empty($widget_title)) {
            $output .= '<h4 class="widget-title">' . purify_html($widget_title) . '</h4>';
        }
        $output .='<div class="widget_search">
                        <form action="'.route('frontend.jobs.search').'" method="get" class="search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search" placeholder="'.__('Search...').'">
                            </div>
                            <button class="submit-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>';

        $output .= $this->widget_after(); // render widget after content

        return $output;
    }

    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __('Job Search');
    }
}