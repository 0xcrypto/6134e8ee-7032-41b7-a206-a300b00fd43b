<img src="<?php echo e($route); ?>"
    style="cursor:pointer;width:<?php echo e($width); ?>px;height:<?php echo e($height); ?>px;"
    title="<?php echo e(trans('support::captcha.update_code')); ?>"
    onclick="this.setAttribute('src','<?php echo e($route); ?>?_='+Math.random());var captcha=document.getElementById('<?php echo e($input_id); ?>');if(captcha){captcha.focus()}"
>
