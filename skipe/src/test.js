// nodemon ./test.js localhost 3000

var mongodb          = require('mongodb');
var config           = require('./configs/main').config;

mongodb.MongoClient.connect(config.mongo.url, function (err, db) {
    if (err) {
        console.error(err);
    }
    // db.collection('user', function (err, collection) {
    //     collection.findOne({email: 'codenamek2010+JamesBond@gmail.com'}, {_id: 1}, function (err, doc) {
    //         console.log(err);
    //         console.log(doc);
    //     });
    // });
    // db.collection('user', function (err, collection) {
    //     collection.findOne({email: 'codenamek2010+JamesBond@gmail.com'}, function (err, doc) {
    //         console.log(err);
    //         console.log(doc);
    //     });
    // });
    // All contacts by owner.
    // db.collection('contact', function (err, collection) {
    //     collection.find({owner: 'James Bond'}, function (err, cursor) {
    //         if (err) { console.error(err); }
    //         cursor.toArray(function(err, docs) {
    //             console.log(docs);
    //         });
    //     });
    // });
    // db.collection('contact', function (err, collection) {
    //     collection.find({'owner.$id': mongodb.ObjectID('54b23de857fe2afb0c1182bf')}, function (err, cursor) {
    //         if (err) { console.error(err); }
    //         cursor.toArray(function(err, docs) {
    //             console.log(docs);
    //         });
    //     });
    // });
    // db.collection('post', function (err, collection) {
    //     collection.find({}, function (err, cursor) {
    //         cursor.toArray(function (err, docs) {
    //             var count = docs.length - 1;
    //             for (i in docs) {
    //                 (function (docs, i) {
    //                     db.dereference(docs[i].chat, function(err, doc) {
    //                         docs[i].chat = doc;
    //                         if (i == count) {
    //                             (function (docs) {
    //                                 console.log(docs);
    //                             })(docs);
    //                         }
    //                     });
    //                 })(docs, i)
    //             }
    //         });
    //     });
    // });
});