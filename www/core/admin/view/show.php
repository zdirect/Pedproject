<div class="vg-wrap vg-element vg-ninteen-of-twenty">
    <div class="vg-element vg-fourth">
        <a href="<?php echo $this->adminPath; ?>add/<?php echo $this->table; ?>"
            class="vg-wrap vg-element vg-full vg-firm-background-color3 vg-box-shadow">
            <div class="vg-element vg-half vg-center">
                <img src="<?php echo PATH.ADMIN_TEMPLATE; ?>img/plus.png" alt="plus">
            </div>
            <div class="vg-element vg-half vg-center vg-firm-background-color1">
                <span class="vg-text vg-firm-color3">Add</span>
            </div>
        </a>
    </div>
    <?php if($this->data): ?>
        <?php foreach($this->data as $data): ?>
            <div class="vg-element vg-fourth">
            <a href="<?php echo $this->adminPath; ?>edit/<?php echo $this->table; ?>/<?php echo $data['id']; ?>"
                class="vg-wrap vg-element vg-full vg-firm-background-color4 vg-box-shadow show_element">
                <?php if($data['img']): ?>
                    <div class="vg-element vg-half vg-center">
                        <img src="<?php echo PATH . UPLOAD_DIR . $data['img']; ?>" alt="service">
                    </div>
                <?php endif; ?>
                <div class="vg-element vg-half vg-center">
                    <span class="vg-text vg-firm-color1"><?php echo $data['name']; ?></span>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>