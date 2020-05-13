<?php

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $value) {
            $type = null;

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);

        $func = 'mysqli_stmt_bind_param';
        $func(...$values);
    }

    return $stmt;
}

function emailVerify ($result_login) {

    if (mysqli_num_rows($result_login)) {

        $email_verify = true;

    } else {

        $email_verify = false;

    };

    return $email_verify;

};

/**
 * Проверка наличия Email
 * @param $pass_check
 * @return true|false
 */
function passCheck ($pass_check) {

    if ($pass_check) {

        $pass_verify = true;

    } else {

        $pass_verify = false;

    };

    return $pass_verify;

};