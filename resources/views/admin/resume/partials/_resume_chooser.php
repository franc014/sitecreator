
<div class="row">
    <div class="col-sm-12 col-md-4">Résumé
        <select id="resume-drop-list" ng-change="getResume(resume)" ng-model="resume"
                ng-options="key as value for (key, value) in resumes ">
            <option value="">-- Selecciona otra versión --</option>
        </select>

    </div>

</div>
<br>



