<div class="container">
    <h1> Wyszukiwarka </h1>
    <p> Szukasz czegoś fajnego? Mamy nadzieję że nasza fajna wyszukiwarka pomoże Ci to znaleźć :) </p>
    
    <div style="height: 64px;"></div>
    
    <?php echo form_open('szukaj'); ?>

    <input type="text" name="keyword" style="font-size: 24px; color: pink; display: block; width: calc(100% - 32px); padding: 8px 15px; border: 1px solid blue;" required />
    
    <input type="submit" value="szukaj" style="font-size: 24px; display: block; width: 100%; padding: 8px 15px; border: 1px solid blue; background: blue; color: white;"/>

    <div style="height: 64px;"></div>
    
    </form>
</div>