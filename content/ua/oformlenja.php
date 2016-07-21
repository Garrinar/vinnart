<div class="prodazh_farby">
    <div class="row color-white">
        <div class="span10">
            <div id="top_text">
                <p><?=$db['top_text']?></p>
            </div>
			<h2>Варіанти оформлення:</h2>
            <ul>
				<?foreach($db['images'] as $item):?>
					<li>
						<p><?=$item['title']?></p>
						<?foreach($item['images'] as $im):?>
							<a href="<?=$im?>" rel="prettyphoto[gallery]">
								<img width="300" src="<?=$im?>" alt="<?=$item['title']?>" />
							</a>
						<?endforeach?>
						<?if(count($item['images']) > 0):?><br><br><?endif?>
					</li>
				<?endforeach?>
            </ul>
        </div>
    </div>
</div>
