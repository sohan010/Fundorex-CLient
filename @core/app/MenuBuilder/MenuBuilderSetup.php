<?php


namespace App\MenuBuilder;


class MenuBuilderSetup extends MenuBuilderBase
{

    public function  static_pages_list()
    {
        return [
            'about',
            'team',
            'faq',
            'blog',
            'contact',
            'career_with_us',
            'events',
            'donation',
            'testimonial',
            'donor',
            'image_gallery',
            'success_story',
            'support_ticket',
        ];
    }

    function register_dynamic_menus()
    {
        return [
            'pages' => [
                'model' => 'App\Page',
                'name' => 'pages_page_name',
                'route' => 'frontend.dynamic.page',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang' //old_lang|new_lang
            ],
            'event' => [
                'model' => 'App\Events',
                'name' => 'events_page_name',
                'route' => 'frontend.events.single',
                'route_params' => ['slug'],
                'title_param' => 'title',
                'query' => 'no_lang', //old_lang|new_lang,
                'enable_when'  => 'events_module_status'
            ],

            'blog' => [
                'model' => 'App\Blog',
                'name' => 'blog_page_name',
                'route' => 'frontend.blog.single',
                'route_params' => ['slug'],
                'title_param' => 'title',
                'query' => 'no_lang' //old_lang|new_lang|no_lang
            ],
            'career_with_us' => [
                'model' => 'App\Jobs',
                'name' => 'career_with_us_page_name',
                'route' => 'frontend.jobs.single',
                'route_params' => ['slug'],
                'title_param' => 'title',
                'query' => 'no_lang', //old_lang|new_lang
                'enable_when'  => 'job_module_status'
            ],

            'success_story' => [
                'model' => 'App\SuccessStory',
                'name' => 'success_story_page_name',
                'route' => 'frontend.success.story.single',
                'route_params' => ['slug'],
                'title_param' => 'title',
                'query' => 'no_lang', //old_lang|new_lang
            ],



        ];
    }

}