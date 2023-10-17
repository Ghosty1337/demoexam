<form action="request.php" method="POST" class="d-flex flex-column">
    <legend>Форма заявления</legend>
    <fieldset>
        <div class="mb-3">
            <label for="state_number" class="form-label">Номер автомобиля</label>
            <input type="text" class="form-control" id="state_number" aria-describedby="state_number" name="state_number" maxlength="15" placeholder="A111AA98RUS" required>
            <div id="state_number_help" class="form-text">Государственный регистрационный номер транспортного средства.</div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control" required></textarea>
            <div id="description_help" class="form-text">Тест вашего заявления.</div>
        </div>
        <button type="submit" class="btn btn-outline-primary w-100">Подать заявление</button>
    </fieldset>
</form>