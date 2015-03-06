var newPassword = function($http){
    //$http.post();
    return {
        updatePassword:function(userId,data){
            return $http.post('/admin/newpassword/'+userId, data);
        }
    }

};

module.exports = newPassword;