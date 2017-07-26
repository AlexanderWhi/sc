<form id="redirect-form" class="admin-form" method="POST" action="?act=saveRedirect">
    <table>
        <thead>
            <tr>
                <th>Старый урл</th>
                <th>Новый урл</th>
            </tr>
        </thead>
        <tbody>
            <? while ($rs->next()) { ?>
                <tr>
                    <td><input style="width:400px" name="field_value[]" value="<?= $rs->get('field_value') ?>"></td>
                    <td><input style="width:400px" name="value_desc[]" value="<?= $rs->get('value_desc') ?>"></td>
                    <td><a href="#" class="del"><img src="/img/pic/trash_16.gif"></a></td>
                </tr>
            <? } ?>
        </tbody>
        <tfoot style="display:none">
            <tr>
                <td><input style="width:400px" name="field_value_"></td>
                <td><input style="width:400px" name="value_desc_"></td>
                <td><a href="#" class="del"><img src="/img/pic/trash_16.gif"></a></td>
            </tr>
        </tfoot>
    </table>

    <a href="#" class="add"><img src="/img/pic/add_16.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <table class="form">
        <tr>
            <td>Импорт данных (старый урл;новый урл)</td>
        </tr>
        <tr>
            <td><textarea name="import"></textarea></td>
        </tr>
    </table>
    

    <button type="submit">Сохранить</button><button type="button" name="close">Закрыть</button>
</form>
<script type="text/javascript" src="/core/component/modules/redirect.js"></script>