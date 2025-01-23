<?php
class Pinked_Text_Renderer extends Pinked_Field_Renderer_Base {
    public function render() {
        if (empty($this->value)) {
            return '';
        }

        ob_start();
        ?>
        <?php echo $this->value ?>
        <?php
        return ob_get_clean();
    }
}