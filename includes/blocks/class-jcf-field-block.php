<?php
class Pinked_Custom_Field_Block {
    private static $instance = null;

    private $renderers = [];

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->register_block();
        $this->load_renderers();
    }

    private function register_block() {
        register_block_type('pinked/jcf-field', [
            'attributes' => [
                'slug' => [
                    'type' => 'string',
                    'default' => ''
                ],
                'type' => [
                    'type' => 'string',
                    'default' => 'text'
                ],
                'style' => [
                    'type' => 'string',
                    'default' => 'default'
                ]
            ],
            'render_callback' => [$this, 'render_block']
        ]);
        register_block_type('pinked/jcf-post-info', [
            'render_callback' => [$this, 'raw_info_render']
        ]);
    }

    private function load_renderers() {
        // Registrar los renderers disponibles
        $this->renderers = [
            'text' => 'Pinked_Text_Renderer'
        ];
    }

    public function raw_info_render($attributes) {
        $renderer = new Pinked_Post_Info_Renderer(get_the_ID(), $attributes);
        return $renderer->render();
    }

    public function render_block($attributes) {
        $field_value = get_field($attributes['slug'], get_the_ID());

        if (empty($field_value)) {
            return '';
        }

        $renderer_class = $this->get_renderer_class($attributes['type']);

        if (!$renderer_class) {
            return '';
        }

        $attributes["id"] = get_the_ID();

        $renderer = new $renderer_class($field_value, $attributes);
        return $renderer->render();
    }

    private function get_renderer_class($type) {
        return isset($this->renderers[$type]) ? $this->renderers[$type] : false;
    }
}