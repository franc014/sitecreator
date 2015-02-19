var thePacker =  function() {

    function MyPacker(_model) {
        //this.meta = _model.$getProperty('jsonMeta', 'meta');
        console.log(_model);
        // you can set some model specific behaviour here, like the property being extracted.
    }

    MyPacker.prototype = {
        unPack: function(_rawData, _record) {
            console.log(_rawData);
            _record.$metadata = _rawData; // store metadata associated with request
            return _rawData.myProp; // extract property from request data.
        },
        unPackMany: function(_rawData, _collection) {

            _collection.$metadata = _rawData; // store metadata associated with request
            return _collection.myProp; // extract property from request data.
        }
    };

    return MyPacker;
};
module.exports = thePacker;
