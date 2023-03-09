import 'dart:convert';

ListUserModel ListUserModelFromMap(String str) =>
    ListUserModel.fromMap(json.decode(str));

String ListUserModelToMap(ListUserModel data) => json.encode(data.toMap());

class ListUserModel {
  ListUserModel({
    required this.page,
    required this.perPage,
    required this.total,
    required this.totalPages,
    required this.data,
    required this.support,
  });

  var page;
  var perPage;
  var total;
  var totalPages;
  List<Datum> data;
  Support support;

  factory ListUserModel.fromMap(Map<String, dynamic> json) => ListUserModel(
        page: json["page"] == null ? null : json["page"],
        perPage: json["per_page"] == null ? null : json["per_page"],
        total: json["total"] == null ? null : json["total"],
        totalPages: json["total_pages"] == null ? null : json["total_pages"],
        data: List<Datum>.from(json["data"].map((x) => Datum.fromMap(x))),
        support: Support.fromMap(json["support"]),
      );

  Map<String, dynamic> toMap() => {
        "page": page == null ? null : page,
        "per_page": perPage == null ? null : perPage,
        "total": total == null ? null : total,
        "total_pages": totalPages == null ? null : totalPages,
        "data": data == null
            ? null
            : List<dynamic>.from(data.map((x) => x.toMap())),
        "support": support == null ? null : support.toMap(),
      };
}

class Datum {
  Datum({
    required this.id,
    required this.email,
    required this.firstName,
    required this.lastName,
    required this.avatar,
  });

  var id;
  var email;
  var firstName;
  var lastName;
  var avatar;

  factory Datum.fromMap(Map<String, dynamic> json) => Datum(
        id: json["id"] == null ? null : json["id"],
        email: json["email"] == null ? null : json["email"],
        firstName: json["first_name"] == null ? null : json["first_name"],
        lastName: json["last_name"] == null ? null : json["last_name"],
        avatar: json["avatar"] == null ? null : json["avatar"],
      );

  Map<String, dynamic> toMap() => {
        "id": id == null ? null : id,
        "email": email == null ? null : email,
        "first_name": firstName == null ? null : firstName,
        "last_name": lastName == null ? null : lastName,
        "avatar": avatar == null ? null : avatar,
      };
}

class Support {
  Support({
    required this.url,
    required this.text,
  });

  var url;
  var text;

  factory Support.fromMap(Map<String, dynamic> json) => Support(
        url: json["url"] == null ? null : json["url"],
        text: json["text"] == null ? null : json["text"],
      );

  Map<String, dynamic> toMap() => {
        "url": url == null ? null : url,
        "text": text == null ? null : text,
      };
}
