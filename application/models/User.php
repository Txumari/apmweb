class User extends DataMapper {

    var $table = 'user';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}