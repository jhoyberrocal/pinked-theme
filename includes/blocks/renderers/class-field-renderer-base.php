<?php
abstract class Pinked_Field_Renderer_Base {
    protected $value;
    protected $attributes;

    public function __construct($value, $attributes) {
        $this->value = $value;
        $this->attributes = $attributes;
    }

    abstract public function render();

    protected function get_wrapper_classes() {
        $classes = ['jcf-field'];
        $classes[] = 'jcf-field-' . $this->attributes['type'];
        if (!empty($this->attributes['style'])) {
            $classes[] = 'style-' . $this->attributes['style'];
        }
        return implode(' ', array_map('sanitize_html_class', $classes));
    }
}