<?php
class Pinked_Post_Info_Renderer extends Pinked_Field_Renderer_Base
{
    public function render()
    {
        $title = get_post($this->value)->post_title;
        $date = get_post($this->value)->post_date;
        $category = get_the_terms($this->value, 'category') ?: [];
        $tags = get_the_terms($this->value, 'post_tag') ?: [];
        $actresses = get_the_terms($this->value, 'actresses') ?: [];
        $producer = get_the_terms($this->value, 'producer') ?: [];
        $imagen = get_field('imagen-post', $this->value);

        foreach ($category as $cat) {
            $cat->color = get_field_term('color-category', $cat->term_id);
        }

        foreach ($actresses as $act) {
            $act->imagen = get_field_term('imagen-actress', $act->term_id);
        }

        $result = [
            'title' => $title,
            'date' => $date,
            'category' => $category,
            'tags' => $tags,
            'actresses' => $actresses,
            'producer' => $producer,
            'imagen' => $imagen,
        ];
        ob_start();
        ?>
        <?php echo json_encode($result)?>
        <?php
        return ob_get_clean();
    }
}